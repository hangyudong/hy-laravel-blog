<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Libraries\Model\Blog\Blog;
use App\Libraries\Model\Intro\Intro;
use Illuminate\Http\Request;


class ContentController extends Controller
{
    /**
     * @var Blog
     */
    private $blog;
    /**
     * @var Intro
     */
    private $intro;

    /**
     * ContentController constructor.
     * @param Blog $blog
     * @param Intro $intro
     */
    public function __construct(Blog $blog,Intro $intro)
    {

        $this->blog = $blog;
        $this->intro = $intro;
    }

    //上传上去
    public function index()
    {
        $intro = $this->Intro();
        return view('home.content.index',compact('intro'));
    }

    //ajaxForm的提交方式
    /**
     * @param Request $request
     * @return mixed
     */
    public function test(Request $request )
    {
      return api_result(200,'成功');
    }

    public function view(Request $request)
    {
        $article_id = $request->get('id');
        $content_detail = $this->blog->getBlogDetail($article_id);
        $intro = $this->intro->getBlogIntro();
       return view('home.content.content_detail',compact('content_detail','intro'));

    }

}
