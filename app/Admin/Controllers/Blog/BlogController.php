<?php

namespace App\Admin\Controllers\Blog;
use App\Libraries\Model\Blog\Blog;
use App\User;
use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class BlogController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('博客');
            $content->description('博客管理');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('博客');
            $content->description('编辑博客信息');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('博客');
            $content->description('写博客');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Blog::class, function (Grid $grid) {
            $grid->model()->orderBy('created_at','desc');
            $grid->filter(function($filter){
                $filter->useModal();
                $filter->like('title','标题');
                $filter->where(function($query){
                    $query->where('type',"{$this->input}");},'类型')
                    ->select(config('enum.blog.type'));
                $filter->where(function($query){
                    $query->where('author',"{$this->input}");},'作者')
                    ->select(function(){
                        $user = new User();
                        return $user->pluck('name','id');
                    });
            });

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->column('author','作者')->display(function(){
                $user = new User();
                $id = $this->author;
                $user = $user->where('id',$id)->first();
                if ($user) {
                    return $user['name'];
                } else {
                    return '';
                }
            });
            $grid->cloumn('type','类型')->display(function(){
                return config('enum.blog.type')[$this->type];
            });
            $grid->created_at('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Blog::class, function (Form $form) {
            $form->display('id')->sortable();
            $form->text('title','标题')->rules('required|min:5');
            $form->select('author','作者')->options(
                function(){
                    $user = new User();
                   return $user->pluck('name','id');
                }
            )->rules('required');
            $form->select('type','类型')->options(config('enum.blog.type'));
            $form->image('images','图片')->name(function($file){
                return Carbon::now()->format('Y-m-d H:i:s').uniqid().'.'.$file->guessExtension();
            });
            $form->editor('content','内容')->attribute('style','height:400px')->rules('required');
        });

    }
}
