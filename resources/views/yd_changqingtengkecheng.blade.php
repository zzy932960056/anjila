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

<!--常青藤课程-->
<div class="container-fluid cqtkc_zhuti">
	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>理念基础<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Teaching concept</div>
    <div class="col-md-12 col-sm-12 col-xs-12 cqtkc_zhuti_fangkuai">
    	<div class="col-md6 cqtkc_zhuti_fangkuai_bai">{!! $curriculum1[0]->text1 !!}</div>
    	<div class="col-md6" style="margin-right:0"><img src="{{$curriculum1[0]->pic1}}"></div>
        
    	<div class="col-md6 cqtkc_zhuti_fangkuai_gao"><img src="{{$curriculum1[0]->pic3}}"></div>
    	<div class="col-md6 cqtkc_zhuti_fangkuai_lan" style="margin-right:0">{!! $curriculum1[0]->text4 !!}</div>

    	<div class="col-md6 cqtkc_zhuti_fangkuai_lan">{!! $curriculum1[0]->text2 !!}</div>
    	<div class="col-md6 cqtkc_zhuti_fangkuai_lan" style="margin-right:0;background:#fff; color:#5b483a">{!! $curriculum1[0]->text3 !!}</div>

        <div class="col-md-12 col-sm-12 col-xs-12"><img src="{{$curriculum1[0]->pic2}}" class="img-responsive"></div>
    </div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 cqtkc_zhuti_nr1">
        <p>
           {!! $curriculum2[0]->paragraph_idea !!}
        </p>
    </div>
    
	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>协商式课程<img src="{{URL::asset('/images_yd/index_btjiantou.png')}}" class="img-responsive"></span>Consultative course</div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 cqtkc_zhuti3">
        	<div class="col-md-12 col-sm-12 col-xs-12">
            	<span class="cqtkc_zhuti3_xian"></span>
            	<div>
                    <p>
                        {!! $curriculum3[0]->text1 !!}
                    </p>
                </div>
            </div>
        	<div class="col-md-12 col-sm-12 col-xs-12">
            	<span class="cqtkc_zhuti3_xian" style="border:3px dashed #e78f8c;"></span>
            	<div style="background:#e78f8c">
                    <p>
                        {!! $curriculum3[0]->text2 !!}
                    </p>
                </div>
            </div>
        	<div class="col-md-12 col-sm-12 col-xs-12" style="margin-right:0">
            	<span class="cqtkc_zhuti3_xian" style="border:3px dashed #99c889;"></span>
            	<div style="background:#99c889">
                    <p>
                        {!! $curriculum3[0]->text3 !!}
                    </p>
                </div>
            </div>
	</div>

    <div class="col-md-12 col-sm-12 col-xs-12 cqtkc_erji_ke">
    	<div id="myCarousel3" class="carousel slide pad_010 b_k">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                @foreach($curriculum5 as $ke => $va)
                @if($ke == 0)
                <li data-target="#myCarousel3" data-slide-to="{{$ke}}" class="active"></li>
                @else
                <li data-target="#myCarousel3" data-slide-to="{{$ke}}"></li>
                @endif
                @endforeach
            </ol>   
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner bor_btm">
                @foreach($curriculum5 as $ke => $va)
                @if($ke == 0)
                <div class="item active">
                    @foreach($va as $k => $v)
                    @if(is_int(($k-1)/2))
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @elseif(is_int(($k-2)/2))
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @endif
                        <div class="cqtkc_zhuti4_img_ceng"><img src="{{$v->carousel_pic}}" class="cqtkc_zhuti4_img"></div>
                        <div class="cqtkc_zhuti4_wenzi_ceng"><p>{{$v->carousel_text}}</p></div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="item">
                    @foreach($va as $k => $v)
                    @if(is_int(($k-1)/2))
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @elseif(is_int(($k-2)/2))
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @endif
                        <div class="cqtkc_zhuti4_img_ceng"><img src="{{$v->carousel_pic}}" class="cqtkc_zhuti4_img"></div>
                        <div class="cqtkc_zhuti4_wenzi_ceng"><p>{{$v->carousel_text}}</p></div>
                    </div>
                    @endforeach
                </div>
                @endif
                @endforeach
            </div>
        </div>
	</div>
    
    <div class="col-md-12 col-sm-12 col-xs-12 cqtkc_zhuti_nr1">
    	<p>
            {!! $curriculum4[0]->paragraph !!}
        </p>
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
    //手势右滑 回到上一个画面
    $('#myCarousel3').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel3").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel3').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel3").carousel('next');
    })
})
</script>
<script src="{{URL::asset('/js_yd/index.js')}}"></script>

</body>
</html>
