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
    	<!--课程介绍-->
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>理念基础<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Teaching concept</div>
        </div>
        
        
        <div class="row cqtkc_zhuti">
        	<div class="col-md-3 col-sm-3 col-xs-3 cqtkc_zuo">
            	<div class="cqtkc_zuo_div1">
                	{!! $curriculum1[0]->text1 !!}
                </div>
            	<div class="cqtkc_zuo_div2">
                    {!! $curriculum1[0]->text4 !!}
                </div>
            </div>
        	<div class="col-md-6 col-sm-6 col-xs-6 cqtkc_zhong">
            	<div class="cqtkc_zhong_div1"><img src="{{$curriculum1[0]->pic1}}" class="cqtkc_zhong_div1_img"></div>
            	<div class="cqtkc_zhong_div2">{!! $curriculum1[0]->text2 !!}</div>
            	<div class="cqtkc_zhong_div3"><img src="{{$curriculum1[0]->pic2}}" class="cqtkc_zhong_div3_img"></div>
			</div>
        	<div class="col-md-3 col-sm-3 col-xs-3 cqtkc_you">
            	<div class="cqtkc_you_div1">
                	{!! $curriculum1[0]->text3 !!}
                </div>
            	<div class="cqtkc_you_div2"><img src="{{$curriculum1[0]->pic3}}" class="cqtkc_you_div2_img"></div>
            </div>
        </div>
        
        <div class="row cqtkc_zhuti2">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $curriculum2[0]->paragraph_idea !!}
        </div>
        
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>协商式课程<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Consultative course</div>
        </div>
        <div class="row cqtkc_zhuti3">
        	<div class="col-md-4 col-sm-4 col-xs-4">
            	<span class="cqtkc_zhuti3_xian"></span>
            	<div>
                    <p>
                        {!! $curriculum3[0]->text1 !!}
                    </p>
                </div>
            </div>
        	<div class="col-md-4 col-sm-4 col-xs-4">
            	<span class="cqtkc_zhuti3_xian" style="border:2px dashed #e78f8c;"></span>
            	<div style="background:#e78f8c">
                    <p>
                        {!! $curriculum3[0]->text2 !!}
                    </p>
                </div>
            </div>
        	<div class="col-md-4 col-sm-4 col-xs-4" style="margin-right:0">
            	<span class="cqtkc_zhuti3_xian" style="border:2px dashed #99c889;"></span>
            	<div style="background:#99c889">
                    <p>
                        {!! $curriculum3[0]->text3 !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="row cqtkc_zhuti2">
           <p> 
            {!! $curriculum4[0]->paragraph !!}
           </p>
        </div>

		<div class="row cqtkc_zhuti4">
            
            <div class="carousel slide" id="pic_cqtkc" data-ride="carousel" data-interval="false" >
            
                <div class="carousel-inner">
                    @foreach($curriculum5 as $ke => $va)
                    @if($ke == 0)
                    <div class="item active">
                        @foreach($va as $k => $v)
                        @if(is_int(($k-1)/3))
                        <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left:10px;">
                        @elseif(is_int(($k-2)/3))
                        <div class="col-md-4 col-sm-4 col-xs-4">
                        @elseif(is_int($k/3))
                        <div class="col-md-4 col-sm-4 col-xs-4" style="margin-right:10px">
                        @endif
                            <div class="cqtkc_zhuti4_img_ceng"><img src="{{$v->carousel_pic}}" class="cqtkc_zhuti4_img"></div>
                            <div class="cqtkc_zhuti4_wenzi_ceng">{{$v->carousel_text}}</div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="item">
                        @foreach($va as $k => $v)
                        @if(is_int(($k-1)/3))
                        <div class="col-md-4 col-sm-4 col-xs-4" style="margin-left:10px;">
                        @elseif(is_int(($k-2)/3))
                        <div class="col-md-4 col-sm-4 col-xs-4">
                        @elseif(is_int($k/3))
                        <div class="col-md-4 col-sm-4 col-xs-4" style="margin-right:10px">
                        @endif
                            <div class="cqtkc_zhuti4_img_ceng"><img src="{{$v->carousel_pic}}" class="cqtkc_zhuti4_img"></div>
                            <div class="cqtkc_zhuti4_wenzi_ceng">{{$v->carousel_text}}</div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @endforeach

                </div>
                
                <a href="#pic_cqtkc" class="left carousel-control left2" data-slide="prev" >
                    <img src="{{URL::asset('/images/ajlwh_tu_zuo.png')}}" class="img-responsive" style="border:none">
                </a>
                <a href="#pic_cqtkc" class="right carousel-control right2" data-slide="next">
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
                                                                                                  