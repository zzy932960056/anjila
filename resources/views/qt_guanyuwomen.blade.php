<!doctype html>
<head>
<meta charset="utf-8">
<title>安吉拉</title>
@include('qt_link')
</head>

<html5>
<link href="{{URL::asset('/css_qt/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('/css_qt/index_css.css')}}" rel="stylesheet" type="text/css">
<link href="{{URL::asset('/css_qt/animate.css')}}" rel="stylesheet" type="text/css">

<script src="{{URL::asset('/js_qt/jquery-2.1.1.js')}}"></script>
<script src="{{URL::asset('/js_qt/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('/js_qt/index_js.js')}}"></script>
<body>
<!--头部-->
@include('qt_head')

<!--主体-->
<div class="container-fluid">
	<div class="container">
    	<!--关于安吉拉-->
		<div class="row ajlwh_erji_bt">关于安吉拉<br /><span>About angela</span></div>
        <div class="row ajlwh_erji_fubt">{{$about[0]->about_title}}</div>
        <div class="row ajlwh_erji_nr">
            {!! $about[0]->about_text !!}
        </div>
        <div class="row gywm_datulunbo">
            <div class="carousel slide" id="pic_gywm1" data-ride="carousel" data-interval="false" >
            
                <div class="carousel-inner">
                    @foreach($about_pic as $k => $v)
                    @if($k == 0)
                    <div class="item active">
                        <div class="col-md-12 col-sm-12 col-xs-12 gywm_erji_dtlb_img_da">
                            <img src="{{$v->about_pic}}" class="img-responsive">
                        </div>
                    </div>
                    @else
                    <div class="item">
                        <div class="col-md-12 col-sm-12 col-xs-12 gywm_erji_dtlb_img_da">
                            <img src="{{$v->about_pic}}" class="img-responsive">
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                
                <a href="#pic_gywm1" class="left carousel-control left1" data-slide="prev" >
                    <img src="{{URL::asset('/images/ajlwh_tu_zuo.png')}}" class="img-responsive" style="border:none">
                </a>
                <a href="#pic_gywm1" class="right carousel-control right1" data-slide="next">
                    <img src="{{URL::asset('/images/ajlwh_tu_you.png')}}" class="img-responsive" style="border:none">
                </a>
                
            </div>
        </div>
        <!--发展历程-->
        <div class="row ajlwh_erji_bt">发展历程<br /><span>Development history</span></div>
        <div class="row ajlwh_erji_nr">
           {!! $history[0]->history_text !!}
        </div>
		<div class="row gywm_erji_fzlc">
            @foreach($time as $k => $v)
            @if($k == 3)
            <div class="col-md-3 col-sm-3 col-xs-3" style="margin-right:0"> 
            @else
        	<div class="col-md-3 col-sm-3 col-xs-3">
            @endif
            	<div class="gywm_erji_fzlc_img_ceng"><img src="{{$v->timer_shaft_pic}}" class="img-responsive"></div>
                <span class="gywm_erji_fzlc_img_xian"></span>
            </div>
            @endforeach

            <div class="col-md-12 col-sm-12 col-xs-12"></div>
            @foreach($time as $k => $v)
            @if($k == 3)
            <div class="col-md-3 col-sm-3 col-xs-3 gywm_erji_fzlc_wenzi" style="margin-right:0 !important">
            @else
        	<div class="col-md-3 col-sm-3 col-xs-3 gywm_erji_fzlc_wenzi">
            @endif
				<p><img src="{{URL::asset('/images/gywm_tu2_5.png')}}" class="img-responsive"></p>
                <p class="gywm_erji_fzlc_wenzi_riqi">{{$v->timer_shaft_year}}</p>
                <p class="gywm_erji_fzlc_wenzi_nr">{{$v->kindergarten1}}<br />{{$v->kindergarten2}}</p>
            </div>
            @endforeach

        </div>

    	<!--团队-->
		<div class="row ajlwh_erji_bt">管理团队<br /><span>The management team</span></div>
        <div class="row ajlwh_erji_nr">
            {!! $team_text[0]->manage_team_text !!}
     	</div>
		
        <div class="row gywm_erji_tuandui_da">
            @foreach($anjila_team as $k => $v)
            @if(is_int(($k+1)/3))
            <div class="col-md-4 col-sm-4 col-xs-4" style="margin-right:0">
            @else
            <div class="col-md-4 col-sm-4 col-xs-4">
            @endif
                <div class="gywm_erji_tuandui_img_ceng"><img src="{{$v->picture}}" class="gywm_erji_tuandui_img"></div>
                <div class="gywm_erji_tuandui_wenzi_ceng">
                    <div class="gywm_erji_tuandui_wenzi_p_da">
                        <p class="gywm_erji_tuandui_wenzi_p1">{{$v->name}}  <span>|</span>  {{$v->position}}</p>
                        <p class="gywm_erji_tuandui_wenzi_p2">
                            {!! $v->introduction !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    	<!--园所分部-->
		<div class="row ajlwh_erji_bt" id="kinder">园所分部<br /><span>Our kindergarten</span></div>

		<div class="row gywm_erji_ysfb_da">
            <div class="carousel slide" id="pic_gywm2" data-ride="carousel" data-interval="false" >
            
                <div class="carousel-inner">
                    @foreach($kindergarten as $ke => $va)
                    @if($ke == 0)
                    <div class="item active">
                        @foreach($va as $k => $v)
                        @if(is_int($k/4))
                        <div class="col-md-3 col-sm-3 col-xs-3" style="margin-right:0">
                        @else
						<div class="col-md-3 col-sm-3 col-xs-3">
                        @endif
                        	<div class="gywm_erji_ysfb_img_ceng"><img src="{{$v->kinder_cover}}" class="gywm_erji_ysfb_img"></div>
                            <div class="gywm_erji_ysfb_wenzi_ceng">
                            	<p class="gywm_erji_ysfb_wenzi_bt">{{$v->kinder_name}}</p>
                                <p class="gywm_erji_ysfb_wenzi_nr">{{$v->kinder_address}}</p>
                                <p class="gywm_erji_ysfb_wenzi_nr">电话：{{$v->kinder_tel1}} <span></span>   {{$v->kinder_tel2}}</p>
                                <p class="gywm_erji_ysfb_wenzi_xian"></p>
                                <a href="/about/details/{{$v->id}}" class="gywm_erji_ysfb_wenzi_more">查看详情<img src="{{URL::asset('/images/gywm_tu9.png')}}" class="img-responsive"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="item">
						@foreach($va as $k => $v)
                        @if(is_int($k/4))
                        <div class="col-md-3 col-sm-3 col-xs-3" style="margin-right:0">
                        @else
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        @endif
                            <div class="gywm_erji_ysfb_img_ceng"><img src="{{$v->kinder_cover}}" class="gywm_erji_ysfb_img"></div>
                            <div class="gywm_erji_ysfb_wenzi_ceng">
                                <p class="gywm_erji_ysfb_wenzi_bt">{{$v->kinder_name}}</p>
                                <p class="gywm_erji_ysfb_wenzi_nr">{{$v->kinder_address}}</p>
                                <p class="gywm_erji_ysfb_wenzi_nr">电话：{{$v->kinder_tel1}} <span></span>   {{$v->kinder_tel2}}</p>
                                <p class="gywm_erji_ysfb_wenzi_xian"></p>
                                <a href="/about/details/{{$v->id}}" class="gywm_erji_ysfb_wenzi_more">查看详情<img src="{{URL::asset('/images/gywm_tu9.png')}}" class="img-responsive"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                </div>
                
                <a href="#pic_gywm2" class="left carousel-control left1" data-slide="prev" >
                    <img src="{{URL::asset('/images/ajlwh_tu_zuo.png')}}" class="img-responsive" style="border:none">
                </a>
                <a href="#pic_gywm2" class="right carousel-control right1" data-slide="next">
                    <img src="{{URL::asset('/images/ajlwh_tu_you.png')}}" class="img-responsive" style="border:none">
                </a>
                
            </div>
        </div>
        
    </div>	
</div>

<!--底部-->
@include('qt_foot')

</body>
</html>
                                                                                                  