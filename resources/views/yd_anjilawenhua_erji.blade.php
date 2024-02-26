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
<div class="container-fluid ajlwh_zhuti">
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" id="idea">
        安吉拉教育理念<br /><span>Education concept</span>
    </div>
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_xiaobt">
        {{$concept[0]->concept_c}}<br /><span>{{$concept[0]->concept_e}}</span>
    </div>
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_nr">
        {!! $concept[0]->concept_index_yd !!}
    </div>
    
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" id="cul">
        安吉拉文化<br /><span>Angela culture</span>
    </div>
    
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_sikuai">
        @foreach($culture as $k => $v)
    	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="ajlwh_erji_wenhua_img_da"><img src="{{$v->culture_cover}}" class="ajlwh_erji_wenhua_img"></div>
            <div class="ajlwh_erji_wenhua_wenzi">
            <p class="ajlwh_erji_wenhua_wenzi_bt">{{$v->culture_name_c}}</p>
            <p class="ajlwh_erji_wenhua_wenzi_nr">{{$v->culture_intro}}</p>
            <a href="/culture/details/{{$v->id}}">更多<img src="{{URL::asset('/images_yd/index_btjiantou2.png')}}" class="img-responsive"></a>
            </div>
        </div>
        @endforeach
    </div>
    
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" style="margin-top:60px;" id="team">
        我们的团队<br /><span>Our team</span>
    </div>
        
    <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_erji_laoshi">
    	<div id="myCarousel2" class="carousel slide pad_010 b_k">
             <!-- 轮播（Carousel）指标 -->
             <ol class="carousel-indicators">
                @foreach($team_teacher as $ke => $va)
                @if($ke == 0)
                <li data-target="#myCarousel2" data-slide-to="{{$ke}}" class="active"></li>
                @else
                <li data-target="#myCarousel2" data-slide-to="{{$ke}}"></li>
                @endif
                @endforeach
             </ol>   
             <!-- 轮播（Carousel）项目 -->
             <div class="carousel-inner bor_btm">
                @foreach($team_teacher as $ke => $va)
                @if($ke == 0)
                <div class="item active">
                    @foreach($va as $k => $v)
                    @if(is_int($k/2))
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @else
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @endif
                        <div class="ajlwh_erji_laoshi_img_da"><img src="{{$v->photo}}" class="ajlwh_erji_laoshi_img"></div>
                        <div class="ajlwh_erji_laoshi_wenzi">
                        <p class="ajlwh_erji_laoshi_wenzi_bt">{{$v->name}}<span>{{$v->position}}</span></p>
                        <p class="ajlwh_erji_laoshi_wenzi_nr">{{$v->academy}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="item">
                    @foreach($va as $k => $v)
                    @if(is_int($k/2))
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @else
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @endif
                        <div class="ajlwh_erji_laoshi_img_da"><img src="{{$v->photo}}" class="ajlwh_erji_laoshi_img"></div>
                        <div class="ajlwh_erji_laoshi_wenzi">
                        <p class="ajlwh_erji_laoshi_wenzi_bt">{{$v->name}}<span>{{$v->position}}</span></p>
                        <p class="ajlwh_erji_laoshi_wenzi_nr">{{$v->academy}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @endforeach    
             </div>
        </div>
    </div>

	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" style="margin-top:150px; margin-bottom:50px">
        安吉拉 • 说<br /><span>Angela said</span>
    </div>
	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_nr">
        {!! $speak[0]->education_speak !!}
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
