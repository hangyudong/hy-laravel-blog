<?php

namespace App\Admin\Controllers\Intro;

use \App\Libraries\Model\Intro\Intro;

use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class IntroController extends Controller
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

            $content->header('博主的个人信息');
            $content->description('介绍');

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

            $content->header('header');
            $content->description('description');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Intro::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('姓名');
            $grid->career('职业');
            $grid->motto('格言');
            $grid->avatar('图片')->display(function($value){
                return '/upload/'.$value;
            });
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Intro::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','姓名');
            $form->text('career','职业');
            $form->text('motto','箴言');
            $form->image('avatar')->name(function($file){
                return Carbon::now()->format('Y-m-d H:i:s').uniqid().'.'.$file->guessExtension();
            });
            $form->editor('intro','介绍')->attribute('style','height:400px');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
