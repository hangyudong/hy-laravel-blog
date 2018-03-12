@extends('layouts.home')
@section('home_content')
    <div class="left" id="c_left">

        <form action="" id="persondetail" method="post">
            {!! csrf_field() !!}
            {{method_field('POST')}}
            <div>姓名：<input name="username" type="text" class="inputbox"></div>
            <div>年龄：<input name="age" type="text" class="inputbox"></div>
            <div>爱好：<input name="good" type="text" class="inputbox"></div>
            <div><input id="submitbtn" type="submit" value="提交"></div>
        </form>
    </div>
   <script>
       $(function () {
           $("form").ajaxForm({
               url:'/content/test',
               type:'post',
               success:function ($data) {
                   console.log($data);
               },
               error:function ($data) {
                    console.log($data+'..........'+'失败的回调');
               }
                   });
       });
   </script>
@stop