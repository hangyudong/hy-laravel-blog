<div id="nav">
<ul>
    @foreach(config('enum.blog.type') as $k=>$v)
    <li><a href="/?id={{$k}}">{{$v}}</a></li>
    @endforeach
</ul>
</div>