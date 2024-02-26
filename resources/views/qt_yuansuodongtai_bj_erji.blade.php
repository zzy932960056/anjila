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
<div class="container-fluid" id="main">
	<div class="container">
    	<!--课程介绍-->
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 index_bt"><span>园所动态<img src="{{URL::asset('/images/index_btjiantou.png')}}" class="img-responsive"></span>Kindergarten activity</div>
			<div class="col-md-12 col-sm-12 col-xs-12 jxts_erji_zhuti">
                <div class="col-md-4 col-sm-4 col-xs-4 jxts_erji_zhuti_zuo">
                    <ul>
                    	<a href="/news_sh #main">
                        <li class="jxts_erji_zhuti_zuo_li1">
                            <p><b class="jxts_erji_zhuti_zuo_li_b jxts_erji_zhuti_zuo_li_b_hua">社会活动</b><br><span>Social activities</span></p>
                            <img src="{{URL::asset('/images/jxts_erji_jiantou1.png')}}" class="img-responsive">
                        </li>
                        </a>
                        <a href="/news_jr #main">
                        <li class="jxts_erji_zhuti_zuo_li2">
                            <p><b class="jxts_erji_zhuti_zuo_li_b">节日活动</b><br><span>FestivaI activity</span></p>
                            <img src="{{URL::asset('/images/jxts_erji_jiantou2.png')}}" class="img-responsive">
                        </li>
                        </a>
                        <a href="/news_bj #main">
                        <li class="jxts_erji_zhuti_zuo_li3 jxts_erji_zhuti_zuo_li3_hua">
                            <p><b class="jxts_erji_zhuti_zuo_li_b">班级活动</b><br><span>Class activities</span></p>
                            <img src="{{URL::asset('/images/jxts_erji_jiantou3.png')}}" class="img-responsive">
                        </li>
                        </a>
                        <a href="/news_fm #main">
                        <li class="jxts_erji_zhuti_zuo_li4">
                            <p><b class="jxts_erji_zhuti_zuo_li_b">父母沙龙</b><br><span>Parents salon</span></p>
                            <img src="{{URL::asset('/images/jxts_erji_jiantou4.png')}}" class="img-responsive">
                        </li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 jxts_erji_zhuti_you">
                	@foreach($news_bj as $k => $v)
                    <a href="/news/details/{{$v->id}}">
                    @if($k == 0)
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @elseif($k == 1)
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @elseif($k == 2)
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    @elseif($k == 3)
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right:0">
                    @endif
                        <div class="jxts_erji_zhuti_you_img_ceng"><img src="{{$v->cover_pic}}" class="jxts_erji_zhuti_you_img"></div>
                        <span>{{$v->title_c}}</span>
                    </div>
                    </a>
                    @endforeach
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 col-xs-offset-4 jxts_erji_zhuti_you_fenye">
                    <!-- 分页 -->
                    {{$news_bj->render()}}
                    <!-- 分页结束 -->
                </div>
            </div>
        </div>
        
    </div>	
</div>

<!--底部-->
@include('qt_foot')

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