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
<a href="/"><div class="container-fluid index_logo"><img src="{{URL::asset('/images_yd/logo2.png')}}" class="img-responsive"></div></a>

<!--安吉拉文化-->
<div class="container-fluid ajlwh_zhuti">
	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt">
        关于安吉拉<br /><span>About angela</span>
    </div>
	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_xiaobt">
        {{$about[0]->about_title}}
    </div>
	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_nr">
        {!! $about[0]->about_text_yd !!}
    </div>

  	<div class="col-md-12 col-sm-12 col-xs-12 gywm_zhuti_datulb">
      	<div id="myCarousel4" class="carousel slide pad_010 b_k">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                @foreach($about_pic as $k => $v)
                @if($k == 0)
                <li data-target="#myCarousel4" data-slide-to="{{$k}}" class="active"></li>
                @else
                <li data-target="#myCarousel4" data-slide-to="{{$k}}"></li>
                @endif
                @endforeach
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner bor_btm">
                @foreach($about_pic as $k => $v)
                @if($k == 0)
                <div class="item active">
                		<div class="col-md-12 col-sm-12 col-xs-12 gywm_zhuti_datulbceng">
                          <img src="{{$v->about_pic}}" class="img-responsive">
                      </div>
                </div>
                @else
                <div class="item">
                		<div class="col-md-12 col-sm-12 col-xs-12 gywm_zhuti_datulbceng">
                          <img src="{{$v->about_pic}}" class="img-responsive">
                      </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    
    
    
	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" style="margin-bottom:40px">
        发展历程<br /><span>Development history</span>
    </div>

	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_nr">
        {!! $history[0]->history_text_yd !!}
    </div>
    
	  <div class="col-md-12 col-sm-12 col-xs-12 gywm_shijianzhou">
        @foreach($time as $k => $v)
      	<div class="col-md-12 col-sm-12 col-xs-12"><img src="{{$v->timer_shaft_pic}}" class="img-responsive"></div>
        <p><img src="{{URL::asset('/images_yd/gywm_tu2_5.png')}}" class="img-responsive"><br />{{$v->timer_shaft_year}}<br /><span>{{$v->kindergarten1}}<br />{{$v->kindergarten2}}</span></p>
        @endforeach
    </div>

	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" style="margin:40px 0">
        管理团队<br /><span>The management team</span>
    </div>

	  <div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_nr">
        {!! $team_text[0]->manage_team_text_yd !!}
    </div>
    

	<div class="col-md-12 col-sm-12 col-xs-12 gywm_zhuti_datulb2">
    	<div id="myCarousel5" class="carousel slide pad_010 b_k">
          <!-- 轮播（Carousel）指标 -->
          <ol class="carousel-indicators">
              @foreach($anjila_team as $k => $v)
              @if($k == 0)
                <li data-target="#myCarousel5" data-slide-to="{{$k}}" class="active"></li>
              @else
                <li data-target="#myCarousel5" data-slide-to="{{$k}}"></li>
              @endif
              @endforeach
          </ol>   
          <!-- 轮播（Carousel）项目 -->
          <div class="carousel-inner bor_btm">
              @foreach($anjila_team as $ke => $va)
              @if($ke == 0)
              <div class="item active">
                  @foreach($va as $k => $v)
                  @if(is_int($k/2))
                  <div class="col-md-6 col-sm-6 col-xs-6 thumbnail gywm_zhuti_datulbceng2" style="margin-right:0">
                  @else
              		<div class="col-md-6 col-sm-6 col-xs-6 thumbnail gywm_zhuti_datulbceng2">
                  @endif
                      <img src="{{$v->picture}}" class="img-responsive">
                      <p>{{$v->name}}<span>丨</span>{{$v->position}}</p>
                  </div>
                  @endforeach
              </div>
              @else
              <div class="item">
              		@foreach($va as $k => $v)
                  @if(is_int($k/2))
                  <div class="col-md-6 col-sm-6 col-xs-6 thumbnail gywm_zhuti_datulbceng2" style="margin-right:0">
                  @else
                  <div class="col-md-6 col-sm-6 col-xs-6 thumbnail gywm_zhuti_datulbceng2">
                  @endif
                      <img src="{{$v->picture}}" class="img-responsive">
                      <p>{{$v->name}}<span>丨</span>{{$v->position}}</p>
                  </div>
                  @endforeach
              </div>
              @endif
              @endforeach
          </div>
      </div>
  </div>

	<div class="col-md-12 col-sm-12 col-xs-12 ajlwh_zhuti_bt" style="margin:50px 0" id="kinder">
        园所分布<br /><span>Our kindergarten</span>
    </div>

	<div class="col-md-12 col-sm-12 col-xs-12 gywm_zhuti_datulb3">
    	<div id="myCarousel6" class="carousel slide pad_010 b_k">
          <!-- 轮播（Carousel）指标 -->
          <ol class="carousel-indicators">
              @foreach($kindergarten as $ke => $va)
              @if($ke == 0)
              <li data-target="#myCarousel6" data-slide-to="{{$ke}}" class="active"></li>
              @else
              <li data-target="#myCarousel6" data-slide-to="{{$ke}}"></li>
              @endif
              @endforeach
          </ol>   
          <!-- 轮播（Carousel）项目 -->
          <div class="carousel-inner bor_btm">
              @foreach($kindergarten as $ke => $va)
              @if($ke == 0)
              <div class="item active">
                  @foreach($va as $k => $v)
                  @if(is_int($k/2))
                  <div class="col-md-6 col-sm-6 col-xs-6 gywm_zhuti_datulbceng3" style="margin-right:0">
                  @else
              	  <div class="col-md-6 col-sm-6 col-xs-6 gywm_zhuti_datulbceng3">
                  @endif
                      <img src="{{$v->kinder_cover}}" class="img-responsive">
                     	<div>
                      	<p class="gywm_zhuti_datulbceng3_bt">{{$v->kinder_name}}</p>
                          <p class="gywm_zhuti_datulbceng3_nr">{{$v->kinder_address}}</p>
                          <p class="gywm_zhuti_datulbceng3_more"><a href="/about/details/{{$v->id}}">查看详情<img src="{{URL::asset('/images_yd/gywm_tu9.png')}}" class="img-responsive"></a></p>
                      </div>
                  </div>
                  @endforeach
              </div>
              @else
              <div class="item">
              		@foreach($va as $k => $v)
                  @if(is_int($k/2))
                  <div class="col-md-6 col-sm-6 col-xs-6 gywm_zhuti_datulbceng3" style="margin-right:0">
                  @else
                  <div class="col-md-6 col-sm-6 col-xs-6 gywm_zhuti_datulbceng3">
                  @endif
                      <img src="{{$v->kinder_cover}}" class="img-responsive">
                      <div>
                        <p class="gywm_zhuti_datulbceng3_bt">{{$v->kinder_name}}</p>
                          <p class="gywm_zhuti_datulbceng3_nr">{{$v->kinder_address}}</p>
                          <p class="gywm_zhuti_datulbceng3_more"><a href="/about/details/{{$v->id}}">查看详情<img src="{{URL::asset('/images_yd/gywm_tu9.png')}}" class="img-responsive"></a></p>
                      </div>
                  </div>
                  @endforeach
              </div>
              @endif
              @endforeach
          </div>
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
$(document).ready(function(){
    //手势右滑 回到上一个画面
    $('#myCarousel4').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel4").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel4').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel4").carousel('next');
    })
})
$(document).ready(function(){
    //手势右滑 回到上一个画面
    $('#myCarousel5').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel5").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel5').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel5").carousel('next');
    })
})

$(document).ready(function(){
    //手势右滑 回到上一个画面
    $('#myCarousel6').bind('swiperight swiperightup swiperightdown',function(){
        $("#myCarousel6").carousel('prev');
    })
    //手势左滑 进入下一个画面
    $('#myCarousel6').bind('swipeleft swipeleftup swipeleftdown',function(){
        $("#myCarousel6").carousel('next');
    })
})

</script>
<script src="{{URL::asset('/js_yd/index.js')}}"></script>

</body>
</html>
