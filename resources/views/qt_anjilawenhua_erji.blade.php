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

<!--banner-->
<div class="container-fluid index_banner">
	<img src="{{$banner[0]->banner_path}}" class="img-responsive">
</div>

<!--主体-->
<div class="container-fluid index_dabj">
	<div class="container">
    	<!--教育理念-->
		<div class="row ajlwh_erji_bt" id="idea">安吉拉教育理念<br /><span>Education concept</span></div>
        <div class="row ajlwh_erji_fubt">{{$concept[0]->concept_c}}<br /><span>{{$concept[0]->concept_e}}</span></div>
        <div class="row ajlwh_erji_nr">
        {!! $concept[0]->concept_index !!}
        </div>
        <!--安吉拉文化-->
        <div class="row ajlwh_erji_bt">安吉拉文化<br /><span>Angela culture</span></div>
		<div class="row ajlwh_erji_wenhua">
            @foreach($culture as $k => $v)
            @if($k == 2)
            <div class="col-md-4 col-sm-4 col-xs-4" style="margin-right:0">
            @else
        	<div class="col-md-4 col-sm-4 col-xs-4">
            @endif
            	<div class="ajlwh_erji_wenhua_img_da"><img src="{{$v->culture_cover}}" class="ajlwh_erji_wenhua_img"></div>
                <div class="ajlwh_erji_wenhua_wenzi">
                <p class="ajlwh_erji_wenhua_wenzi_bt">{{$v->culture_name_c}}</p>
                <p class="ajlwh_erji_wenhua_wenzi_nr">{{$v->culture_intro}}</p>
                <a href="/culture/details/{{$v->id}}">更多<img src="{{URL::asset('/images/index_btjiantou2.png')}}" class="img-responsive"></a>
                </div>
            </div>
            @endforeach
        </div>
    	<!--团队-->
		<div class="row ajlwh_erji_bt" id="team">我们的团队<br /><span>Our team</span></div>
        <div class="row ajlwh_erji_nr">
        {!! $team_intro[0]->team_text !!}
        </div>
		<div class="row ajlwh_erji_dantu"><img src="{{$team_intro[0]->team_pic}}" class="img-responsive"></div>

		<div class="row ajlwh_erji_laoshi">

            <div class="carousel slide" id="pic_ajlwh" data-ride="carousel" data-interval="false" >
            
                <div class="carousel-inner">
                    @foreach($team_teacher as $ke => $va)
                    @if($ke == 0)
                    <div class="item active">
                        @foreach($va as $k => $v)
                        @if(is_int($k/4))
                        <div class="col-md-3 col-sm-3 col-xs-3" style=" margin-right:0">
                        @else
                        <div class="col-md-3 col-sm-3 col-xs-3">
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
                        @if(is_int($k/4))
                        <div class="col-md-3 col-sm-3 col-xs-3" style=" margin-right:0">
                        @else
                        <div class="col-md-3 col-sm-3 col-xs-3">
                        @endif
                            <div class="ajlwh_erji_laoshi_img_da"><img src="{{$v->photo}}" class="ajlwh_erji_laoshi_img"></div>
                            <div class="ajlwh_erji_laoshi_wenzi">
                            <p class="ajlwh_erji_laoshi_wenzi_bt">{{$v->name}}<span>{{$v->position}}</span></p>
                            <p class="ajlwh_erji_laoshi_wenzi_nr">{{$v->academy}}{{$k}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endforeach

                </div>
                
                <a href="#pic_ajlwh" class="left carousel-control left1" data-slide="prev" >
                    <img src="{{URL::asset('/images/ajlwh_tu_zuo.png')}}" class="img-responsive" style="border:none">
                </a>
                <a href="#pic_ajlwh" class="right carousel-control right1" data-slide="next">
                    <img src="{{URL::asset('/images/ajlwh_tu_you.png')}}" class="img-responsive" style="border:none">
                </a>
                
            </div>
        
        </div>

    	<!--安吉拉说-->
		<div class="row ajlwh_erji_bt">安吉拉 • 说<br /><span>Angela said</span></div>
        <div class="row ajlwh_erji_nr">
        {!! $speak[0]->education_speak !!}
        </div>
        
    </div>	
</div>

<!--底部-->
@include('qt_foot')

</body>
</html>
                                                                                                  