<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\Model\Blog\Blog;
use App\User;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

class HomeController extends Controller
{
    //用户
    private $user;
    //博客
    private $blog;
    //初始化成员
    public function __construct(User $user,Blog $blog)
    {
        $this->user = $user;
        $this->blog = $blog;
    }

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('博客园');
            $content->description('博客后台');
            $user_count = $this->user->getNewUser();
            $blog_count = $this->blog->getNewBlog();
            $content->row(function ($row) use ($user_count,$blog_count) {
                $row->column(3, new InfoBox('今日新增的用户', 'users', 'aqua', '/admin/user/user-list',$user_count));
                $row->column(3, new InfoBox('今日新增博客', 'shopping-cart', 'green', '/admin/blog/blog-list', $blog_count));
            });

        });
    }
}
