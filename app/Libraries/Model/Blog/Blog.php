<?php

namespace App\Libraries\Model\Blog;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'type','content'
    ];

    /**
     * 统计新建博客的数量
     * */
    public function getNewBlog()
    {
        $time = Carbon::now()->startOfDay();
        return $this->where('created_at','>',$time)->count();
    }
    /**
     *和用户绑定
     */
    public function user()
    {
        return $this->hasOne(User::class,'id','author');
    }
    /**
     * 获取所有的博客内容
      */
    public function getAllBlog($id)
    {
        return $this->with('user')->where('type',$id)
            ->orderBy('created_at','desc')->paginate(5)->appends(request()->all());
    }

    /**
     * @param $article_id
     */
    public function getBlogDetail($article_id)
    {
        return $this->where('id',$article_id)->first();
    }

}
