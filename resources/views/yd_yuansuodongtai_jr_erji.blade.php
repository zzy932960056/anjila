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

<!--教学特色-->
<div class="container-fluid jxte_zhuti">
	  <div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>园所动态<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Kindergarten activity</div>
    <div class="col-md-12 col-sm-12 col-xs-12 jxte_xuanxiangka_btn">
        <a href="/news_sh #main">
      	    <div class="col-md-3 col-sm-3 col-xs-3" id="jxte_xuanxiangka_btn1">社会活动</div>
      	</a>
        <a href="/news_jr #main">
            <div class="col-md-3 col-sm-3 col-xs-3 jxte_xuanxiangka_btn_col3_2" style="border:1px solid #e78f8c;" id="jxte_xuanxiangka_btn2">节日活动</div>
      	</a>
        <a href="/news_bj #main">
            <div class="col-md-3 col-sm-3 col-xs-3" style="border:1px solid #99c889;" id="jxte_xuanxiangka_btn3">班级活动</div>
      	</a>
        <a href="/news_fm #main">
            <div class="col-md-3 col-sm-3 col-xs-3" style="margin-right:0; border:1px solid #eedd6c;" id="jxte_xuanxiangka_btn4">父母沙龙</div>
        </a>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 jxte_mianban" id="jxte_mianban1">
        @foreach($news_jr as $k => $v)
      	<a href="/news/details/{{$v->id}}">
            @if($k == 0)
            <div class="col-md-6 col-sm-6 col-xs-6">
            @elseif($k == 1)
            <div class="col-md-6 col-sm-6 col-xs-6">
            @elseif($k == 2)
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:0">
            @elseif($k == 3)
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:0">
            @endif
                <img src="{{$v->cover_pic}}" class="img-responsive"><span>{{$v->title_c}}</span>
            </div>
        </a>
        @endforeach
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 jxte_fenye">
        <!-- 分页 -->
        {{$news_jr->render()}}
        <!-- 分页结束 -->
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
</script>
<script src="{{URL::asset('/js_yd/index.js')}}"></script>

</body>
</html>
<style type="text/css">
    .pagination li a{padding: 3px 8px !important; margin: 0 10px !important; background: none !important; border: none ; color: #5b483a !important; font-size: 18px;}
    .pagination li span{padding: 3px 8px !important; margin: 0 10px !important; background: none !important; border: none ; color: #5b483a !important; font-size: 18px;}
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 2;
        color: #5b483a;
        cursor: default;
        background:none !important;
        border: 1px solid #5b483a !important;
        border-color: #5b483a !important;
    }
</style> 