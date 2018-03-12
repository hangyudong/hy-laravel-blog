<!DOCTYPE HTML>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="" />
    {{--加载分页的css--}}
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/index.css"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/animate.css"/>
    <link rel="stylesheet" href="/css/lrtk.css"/>
    <link rel="stylesheet" href="/css/photo.css"/>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/js/jquery.waterfall.2.1.1.js"></script>
    <script type="text/javascript" src="/js/jquery.transform-0.9.1.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <script type="text/javascript" src="/js/JqueryForm/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/JqueryForm/jquery.form.min.js.map"></script>
    {{--加载分页--}}
    <script  type="text/javascript" src="/js/bootstrap.js"></script>
    {{--<script  type="text/javascript" src="/js/extendPagination.js"></script>--}}
    {{--<script  type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>--}}
    <!--[if lt IE 9]>
    <script src="/js/html5.js"></script>
    <script  type="text/javascript" src="/js/nav.js"></script>
    <![endif]-->
</head>

<body>
<!--header start-->
<div id="header">
    <h1>个人博客</h1>
    <p>{{$intro['motto']}}</p>
</div>
<!--header end-->
<!--nav-->
@include('layouts.top')
<!--nav end-->
<!--content start-->
@yield('content')
<!--content end-->
<!--footer start-->
<div id="footer">
    <p>Design by:<a href="#" target="_blank">出发吧少年</a><b id="setTime">{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</b></p>
</div>
<!--footer end-->
<script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
<script>
   time =  document.getElementById(' ');
    test = time.innerHTML;
   setInterval("myInterval()",1000);//1000为1秒钟
   function myInterval()
   {
       time.innerHTML = new Date();
   }
</script>
</body>
</html>
