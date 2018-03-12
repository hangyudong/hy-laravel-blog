@extends('layouts.app')

@section('content')
<div id="content">
    <!--left-->
    @yield('home_content')
    <!--left end-->
    <!--right-->
    <div class="right" id="c_right">
        <div class="s_about">
            <h2>关于博主</h2>
            <img src="{{'/upload/'.$intro['avatar']}}" width="230" height="230" alt="博主"/>
            <p>博主：{{$intro['name']}}</p>
            <p>职业：{{$intro['career']}}</p>
            <p>简介：{!! $intro['intro']!!}</p>
            <p>
                <a href="https://graph.qq.com/oauth2.0/authorize" title="联系博主" target="_blank">
                    <img alt="Connect_logo_4.png" src="http://qzonestyle.gtimg.cn/qzone/vas/opensns/res/img/Connect_logo_4.png">
                    {{--<span class="left b_1"></span>--}}
                </a>

                {{--<a href="#" title="加入QQ群，一起学习！"><span class="left b_2"></span></a>--}}
            <div class="clear"></div>
            </p>
        </div>
        <!--栏目分类-->
        <div class="lanmubox">
            <div class="hd">
                <ul><li>精心推荐</li><li>最新文章</li></ul>
            </div>
            <div class="bd">
                <ul>
                    <li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
                    <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                    <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                    <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                    <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                </ul>
                <ul>
                    <li><a href="#" title="网站项目实战开发（-）">网站项目实战开发（-）</a></li>
                    <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                    <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                    <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                    <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                </ul>
            </div>
        </div>
        <!--end-->
        <div class="link">
            <h2>友情链接</h2>
            <p><a href="http://weibo.com/u/3359167944/home?wvr=5&uut=fin&from=reg" target="_blank">博客</a></p>
        </div>
    </div>
    <!--right end-->
    <div class="clear"></div>
</div>
    @stop