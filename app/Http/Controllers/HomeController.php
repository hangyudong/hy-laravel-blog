<?php

namespace App\Http\Controllers;

use App\Libraries\Model\Blog\Blog;
use App\Libraries\Model\Intro\Intro;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    private $blog;
    private $intro;
    //初始化
    public function __construct(Blog $blog,Intro $intro)
    {
        $this->blog = $blog;
        $this->intro = $intro;
    }

    //根据时间获取博客的列表
    public function index(Request $request)
    {
        $id = $request->get('id',0);
//        获取博客的内容
        $blog = $this->blog->getAllBlog($id);
        $intro = $this->intro->getBlogIntro();
        return view('home.app.index',compact('blog','intro'));
    }

}
