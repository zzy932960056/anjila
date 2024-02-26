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

<!--头部-->
<div class="container-fluid index_toptiao"></div>
@include('yd_banner')

<!--首页导航-->
<div class="container-fluid index_daohang">
    <a href="/">
	      <div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:5px;">
    	      <div  class="index_daohang_da">
                <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/xiongmao.png')}}" class="img-responsive"></div>
                <div class="index_daohang_wenzi">首          页<br><span>Home page</span></div>
            </div>
        </div>
    </a>
    <a href="/teaching_yt">
    	  <div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:5px;">
        	  <div  class="index_daohang_da">
                <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/mao.png')}}" class="img-responsive"></div>
                <div class="index_daohang_wenzi">教学特色<br><span>Special teaching</span></div>
            </div>
        </div>
    </a>
    <a href="/culture">
	<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:5px;">
    	<div  class="index_daohang_da">
            <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/laihama.png')}}" class="img-responsive"></div>
            <div class="index_daohang_wenzi">安吉拉文化<br><span>Angela culture</span></div>
        </div>
    </div>
    </a>
    <a href="/news_sh">
	<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:5px;">
    	<div  class="index_daohang_da">
            <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/xiong.png')}}" class="img-responsive"></div>
            <div class="index_daohang_wenzi">园所动态<br><span>Kindergarten activity</span></div>
        </div>
    </div>
    </a>
    <a href="/curriculum">
	<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:5px;">
    	<div  class="index_daohang_da">
            <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/tuzi.png')}}" class="img-responsive"></div>
            <div class="index_daohang_wenzi">常青藤课程<br><span>Consultative course</span></div>
        </div>
    </div>
    </a>
    <a href="/about">
	<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:5px;">
    	<div  class="index_daohang_da">
            <div class="index_daohang_dongwu"><img src="{{URL::asset('/images_yd/xiaodongwu/huli.png')}}" class="img-responsive"></div>
            <div class="index_daohang_wenzi">关于我们<br><span>About angela</span></div>
        </div>
    </div>
    </a>
</div>

<!--教学特色-->
<div class="container-fluid index_zhutu_jxts">
	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>教学特色<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Special teaching</div>
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_jxts_da">
      <a href="/teaching_yt">
    	    <div class="col-md-6 col-sm-6 col-xs-6"><div><span>亿童课程</span></div></div>
      </a>
      <a href="/teaching_bl">
    	    <div class="col-md-6 col-sm-6 col-xs-6"><div class="index_zhutu_jxts_da_div_2"><span class="index_zhutu_jxts_da_div_span2">布朗课程</span></div></div>
    	</a>
      <a href="/teaching_ys">
          <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:0"><div class="index_zhutu_jxts_da_div_3"><span class="index_zhutu_jxts_da_div_span3">艺术创想</span></div></div>
    	</a>
      <a href="/teaching_zj">
          <div class="col-md-6 col-sm-6 col-xs-6" style="margin-bottom:0"><div class="index_zhutu_jxts_da_div_4"><span class="index_zhutu_jxts_da_div_span4">安吉拉早教</span></div></div>
      </a>
    </div>
</div>

<!--安吉拉文化-->
<div class="container-fluid index_zhutu_ajlwh">
	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>安吉拉文化<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Angela culture</div>
    @foreach($home_culture as $k => $v)
    @if($k == 0)
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ajlwh_da">
    @elseif($k == 1)
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ajlwh_da" style="border:2px solid #f58989">
    @elseif($k == 2)
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ajlwh_da" style="border:2px solid #8bcb82">
    @elseif($k == 3)
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ajlwh_da" style="border:2px solid #f1dd56">
    @endif
        @if($k == 0)
        <a href="/culture #idea">
        @elseif($k == 1)
        <a href="/culture/details/1">
        @elseif($k == 2)
        <a href="/culture #team">
        @elseif($k == 3)
        <a href="/culture/details/3">
        @endif
    		    <img src="{{$v->cover_pic}}" class="img-responsive">
            <div class="index_zhutu_ajlwh_da_wenzi">{{$v->cover_sort}}<span>Education </span><img src="{{URL::asset('/images_yd/index_btjiantou2.png')}}" class="img-responsive"></div>
        </a>
    </div>
    @endforeach
</div>

<!--园所动态-->
<div class="container-fluid index_zhutu_ysdt">
	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>园所动态<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Kindergarten activity</div>
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ysdt_da">
        <ul>
          @foreach($news as $k => $v)
          @if($k == 0)
            <a href="/news/details/{{$v->id}}"><li><span class="index_ysdt_zt_new"><img src="{{URL::asset('/images_yd/new.gif')}}" ></span>{{$v->title_c}}<span>{{$v->date_time}}</span></li></a>
          @elseif($k == 1)
            <a href="/news/details/{{$v->id}}"><li>{{$v->title_c}}<span>{{$v->date_time}}</span></li></a>
          @elseif($k == 2)  
            <a href="/news/details/{{$v->id}}"><li style=" border-bottom:0">{{$v->title_c}}<span>{{$v->date_time}}</span></li></a>
          @endif
          @endforeach
        </ul>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ysdt_more"><a href="/news_sh"><span>查看更多<img src="{{URL::asset('/images_yd/index_btjiantou2.png')}}" class="img-responsive"></span></a></div>
</div>

<!--园所地址-->
<div class="container-fluid index_zhutu_ysdz">
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ysdz_da">
		<div class="col-md-7 col-sm-7 col-xs-7">
        <div class="index_zhutu_ysdz_img_zuo_da"><img src="{{$home_last_pic[0]->pic_path}}" class="img-responsive"></div>
        <img src="{{URL::asset('/images_yd/index_ysdz_tu3.png')}}" class="img-responsive index_zhutu_ysdz_img1">
        <img src="{{URL::asset('/images_yd/index_ysdz_tu4.png')}}" class="img-responsive index_zhutu_ysdz_img2">
        <img src="{{URL::asset('/images_yd/index_ysdz_tu5.png')}}" class="img-responsive index_zhutu_ysdz_img3">
    </div>
		<div class="col-md-5 col-sm-5 col-xs-5">
        <a href="/about/details/{{$kindergarten_index[0]->id}}">
            <div class="index_zhutu_ysdz_img_you_da">
                <img src="{{$kindergarten_index[0]->first_picture}}" class="img-responsive">
                <div class="index_zhutu_ysdz_img_you_wenzi">
                	<p class="index_zhutu_ysdz_img_you_bt">{{$kindergarten_index[0]->kinder_name}}</p>
                	<p class="index_zhutu_ysdz_img_you_nr">{{$kindergarten_index[0]->kinder_address}}</p>
                </div>
            </div>
        </a>
        <img src="{{URL::asset('/images_yd/index_ysdz_tu6.png')}}" class="img-responsive index_zhutu_ysdz_img4">
        <img src="{{URL::asset('/images_yd/index_ysdz_tu7.png')}}" class="img-responsive index_zhutu_ysdz_img5">
    </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 index_zhutu_ysdt_more"><a href="/about #kinder"><span>查看更多<img src="{{URL::asset('/images_yd/index_btjiantou2.png')}}" class="img-responsive"></span></a></div>
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
