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
	<a href="/culture #cul"><div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_fanhui"><span><img src="{{URL::asset('/images_yd/sanji_zuojiantou.png')}}" class="img-responsive">安吉拉文化</span></div></a>
	<div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_zhuti_dafangzi">
    	<div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_zhuti_dongwu"><img src="{{URL::asset('/images_yd/jxts_sanji_tu1.png')}}" class="img-responsive"></div>
        <div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_bt"><p><span>{{$culture[0]->culture_name_c}}<b>{{$culture[0]->culture_name_e}}</b></span></p></div>
        
        @foreach($label_details as $k => $v)
        <div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_xiaobt">
            {{$v->label_name}}
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 tongyong_sanji_nr">
            @foreach($v->details as $de)
            @if($de->label_pic)
            <div class="tongyong_sanji_nr_tu"><img src="{{$de->label_pic}}" class="img-responsive"></div>
            @endif
            @if($de->label_text)
            <p>
                {{$de->label_text}}
            </p>
            @endif
            @endforeach
        </div>
        @endforeach

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