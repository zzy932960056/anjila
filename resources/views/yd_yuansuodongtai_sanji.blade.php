<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.552, minimum-scale=0.552, maximum-scale=0.552, user-scalable=no">
<title>安吉拉</title>
</head>
<link href="{{URL::asset('/css_yd/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('/css_yd/index.css')}}" rel="stylesheet" type="text/css">

<body>

<!--侧滑导航-->
@include('yd_navigation')

<!--头部-->
<div class="container-fluid index_toptiao"></div>
@include('yd_banner')

<!--安吉拉文化-->
<div class="container-fluid tongyong_sanji_zhuti">
	<a href="{{$news[0]->a_link}}"><div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_fanhui"><span><img src="{{URL::asset('/images_yd/sanji_zuojiantou.png')}}" class="img-responsive">{{$news[0]->sort}}</span></div></a>
	<div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_zhuti_dafangzi">
    	<div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_zhuti_dongwu"><img src="{{URL::asset('/images_yd/jxts_sanji_tu1.png')}}" class="img-responsive"></div>
        <div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_bt"><p><span>{{$news[0]->title_c}}</span><br /><span><b>{{$news[0]->title_e}}</b></span></p></div>
        <div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_nr">
            @foreach($details as $v)
            @if($v->news_pic)
            <div class="tongyong_sanji_nr_tu"><img src="{{$v->news_pic}}" class="img-responsive"></div>
            @endif
            @if($v->news_text)
            <p>
               {!! $v->news_text !!}
            </p>
            @endif
            @endforeach
        </div>
    </div>
</div>

<!--底部-->
@include('yd_foot')

<script src="{{URL::asset('/js_yd/jquery-2.1.1.min.js')}}"></script>
<script src="{{URL::asset('/js_yd/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js_yd/xin/jgestures.min.js')}}"></script>
<script>
$(document).ready(function(){
    //手势右滑 回到上一个画面
    $('#myCarousel').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel").carousel('next');
    })
})
$(document).ready(function(){
    //手势右滑 回到上一个画面
    $('#myCarousel2').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel2").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel2').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel2").carousel('next');
    })
})
</script>
<script src="{{URL::asset('/js_yd/index.js')}}"></script>

</body>
</html>
