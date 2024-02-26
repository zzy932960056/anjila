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
<?php
$agent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS"))
header("Location:http://m.ajljy.com");
?>
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
    	<!--教学特色-->
    	<div class="row">
            <a href="/teaching_yt">
        	   <div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>教学特色<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Special teaching</div>
        	</a>
            <div class="col-md-12 col-sm-12 col-xs-12 index_jxts_zhuti">
                <a href="/teaching_yt">
                	<div class="col-md-3 col-sm-3 col-xs-3 animated" style="border:2px dashed #92ccec">
                    	<div style=" background:#92ccec; ">亿童课程</div>
                    </div>
                </a>
                <a href="/teaching_bl">
                	<div class="col-md-3 col-sm-3 col-xs-3 animated" style="border:2px dashed #e78f8c">
                    	<div style=" background:#e78f8c; ">布朗课程</div>
                    </div>
                </a>
                <a href="/teaching_ys">
                	<div class="col-md-3 col-sm-3 col-xs-3 animated" style="border:2px dashed #99c889">
                    	<div style=" background:#99c889; ">艺术创想</div>
                    </div>
                </a>
                <a href="/teaching_zj">
                	<div class="col-md-3 col-sm-3 col-xs-3 animated" style="border:2px dashed #eedd6c; margin-right:0">
                    	<div style=" background:#eedd6c; ">安吉拉早教</div>
                    </div>
                </a>
            </div>
        </div>
        
    	<!--安吉拉文化-->
    	<div class="row">
            <a href="/culture">
        	   <div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>安吉拉文化<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Angela culture</div>
        	</a>
            <div class="col-md-12 col-sm-12 col-xs-12 index_ajlwh_zhuti">
                @foreach($home_culture as $k => $v)
                @if($k == 0)
            	<div class="col-md-6 col-sm-6 col-xs-6" style="border:2px solid #92ccec">
                @elseif($k == 1)
                <div class="col-md-6 col-sm-6 col-xs-6" style="border:2px solid #e78f8c; margin-right:0">
                @elseif($k == 2)
                <div class="col-md-6 col-sm-6 col-xs-6" style="border:2px solid #99c889; margin-bottom:0">
                @elseif($k == 3)
                <div class="col-md-6 col-sm-6 col-xs-6" style="border:2px solid #eedd6c; margin-right:0; margin-bottom:0">
                @endif
                	@if($k == 0)
                    <a href="/culture #idea" style="text-decoration:none">
                    @elseif($k == 1)
                    <a href="/culture/details/1" style="text-decoration:none">
                    @elseif($k == 2)
                    <a href="/culture #team" style="text-decoration:none">
                    @elseif($k == 3)
                    <a href="/culture/details/3" style="text-decoration:none">
                    @endif
                        <div class="index_ajlwh_zhuti_img_ceng"><img src="{{$v->cover_pic}}" class="index_ajlwh_zhuti_img"></div>
                        <div class="index_ajlwh_zhuti_wenzi_ceng">{{$v->cover_sort}}<span>Education <img src="{{URL::asset('/images/index_btjiantou2.png')}}" class="img-responsive"></span></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        
    	<!--园所动态-->
    	<div class="row">
            <a href="/news_sh">
        	   <div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>园所动态<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Kindergarten activity</div>
        	</a>
            <div class="col-md-12 col-sm-12 col-xs-12 index_ysdt_zhuti">
                	<ul>
                        @foreach($news as $k => $v)
                        @if($k == 0)
                        <a href="/news/details/{{$v->id}}"><li><span class="index_ysdt_zt_new"><img src="{{URL::asset('/images/new.gif')}}"></span>安吉拉{{$v->sort}}：{{$v->title_c}}<span class="index_ysdt_zt_riqi">{{$v->date_time}}</span></li></a>
                        @elseif($k != 0)
                        <a href="/news/details/{{$v->id}}"><li>安吉拉{{$v->sort}}：{{$v->title_c}}<span class="index_ysdt_zt_riqi">{{$v->date_time}}</span></li></a>
                        @endif
                        @endforeach
                    </ul>
                    <img src="{{URL::asset('/images/index_xiaotu1.png')}}" class="img-responsive index_xiaotu1">
                    <a class="index_ysdt_zhuti_more" href="/news_sh">查看更多<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></a>
            </div>
        </div>
        
    	<!--园所地址-->
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 index_ysdz_zhuti">
				<div class="col-md-7 col-sm-7 col-xs-7 index_ysdz_zhuti_zuo">
                    <img src="{{URL::asset('/images/index_ysdz_tu3.png')}}" class="img-responsive index_ysdz_zhuti_zuo_img_xiao1">
                    <img src="{{URL::asset('/images/index_ysdz_tu4.png')}}" class="img-responsive index_ysdz_zhuti_zuo_img_xiao2">
                    <img src="{{URL::asset('/images/index_ysdz_tu5.png')}}" class="img-responsive index_ysdz_zhuti_zuo_img_xiao3">
                	<div class="index_ysdz_zhuti_zuo_img_ceng">
                        <img src="{{$home_last_pic[0]->pic_path}}" class="index_ysdz_zhuti_zuo_img">
                    </div>
                </div>
				<div class="col-md-5 col-sm-5 col-xs-5 index_ysdz_zhuti_you">
                    <a href="/about/details/{{$kindergarten_index[0]->id}}">
                    	<div class="index_ysdz_zhuti_you_img_ceng">
                            <img src="{{$kindergarten_index[0]->first_picture}}" class="index_ysdz_zhuti_you_img">
                        </div>
                    </a>
                    <div class="index_ysdz_zhuti_you_wenzi_ceng">
                    	<p class="index_ysdz_zhuti_you_wenzi_ceng_bt1">{{$kindergarten_index[0]->kinder_name}}</p>
                        <p class="index_ysdz_zhuti_you_wenzi_ceng_nr1">{{$kindergarten_index[0]->kinder_address}}</p>
                        <a class="index_ysdz_zhuti_you_wenzi_ceng_more" href="/about #kinder">查看更多<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></a>
                    </div>
                    <img src="{{URL::asset('/images/index_ysdz_tu7.png')}}" class="img-responsive index_ysdz_zhuti_you_img_xiao1">
                    <img src="{{URL::asset('/images/index_ysdz_tu6.png')}}" class="img-responsive index_ysdz_zhuti_you_img_xiao2">
                </div>

            </div>
        </div>
        
    </div>	
</div>

<!--底部-->
@include('qt_foot')

</body>
</html>
                                                                                                  