@extends('layouts.home')
@section('home_content')
    <div class="left" id="c_left" style="min-height: 843px">
        <div class="s_tuijian">
            <h2>文章<span>列表</span></h2>
        </div>
        <div class="content_text">
            @forelse($blog as $k=>$v)
            <!--wz-->
            <div class="wz">
                <h3><a href="#" title="浅谈：html5和html的区别">{{$v->title}}</a></h3>
                <dl>
                    <dt><a href="/content/view?id={{$v->id}}"><img src="{{empty($v->images)?(env('LOCAL_IMAGE').'/upload/image/2017-12-11 18:29:555a2e5e23ea91d.jpeg'):(env('LOCAL_IMAGE').'/upload/'.$v->images)}}" width="200"  height="123" alt=""></a></dt>
                    <dd>
                        <p class="dd_text_1"><a href="/content/view?id={{$v->id}}">{{str_limit(strip_tags($v->content),260,'......')}}</a></p>
                        <p class="dd_text_2">
                            <span class="left author" style="width: 100px">{{$v->user['name']}}</span>
                            <span class="left sj" style="width: 140px">时间:{{$v->created_at->format('Y-m-d')}}</span>
                            <span class="left fl">分类:<a  title="学无止境">{{config('enum.blog.type')[$v->type]}}</a></span>
                            <span class="left yd"><a href="/content/view?id={{$v->id}}" title="阅读全文">阅读全文</a>
                   </span>
                        <div class="clear"></div>
                        </p>
                    </dd>
                    <div class="clear"></div>
                </dl>
            </div>
                        @empty
                        @endforelse
                                {!! $blog->render() !!}
            <!--wz end-->
        </div>
    </div>
@stop