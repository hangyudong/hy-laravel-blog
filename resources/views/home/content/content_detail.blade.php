@extends('layouts.home')
@section('home_content')
    <div class="left" id="c_left">
        <div class="container-fluid" style="min-height: 843px">
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="text-center">
                        {{$content_detail->title}}
                    </h3>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    {{--<img  src="{{env('LOCAL_IMAGE').'/upload/'.$content_detail->images}}" class="img-circle" />--}}
                    <p>
                        {!!$content_detail->content  !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop