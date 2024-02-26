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
<div class="container-fluid" id="qunimade">
	<div class="container">
    	<div class="row">
            <p class="jxte_sanji_mbx">当前位置:<a href="/">首页</a>><a href="/news_sh">园所动态</a>><a href="#">{{$news[0]->title_c}}</a></p>
		</div>
        <div class="row jxts_sanji_dafangzi">
        	<div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_xiaotu"><img src="{{URL::asset('/images/ysdt_sanji_tu1.png')}}" class="img-responsive"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_bt" style="margin-bottom:35px"><p><span>{{$news[0]->title_c}}<b>{{$news[0]->title_e}}</b></span></p></div>
			@foreach($details as $v)
            @if($v->news_text)
            <div class="col-md-12 col-sm-12 col-xs-12 ysdt_sanji_nr_wenzi">
                {!! $v->news_text !!}
            </div>
            @endif
            @if($v->news_pic)
            <div class="col-md-12 col-sm-12 col-xs-12 ysdt_sanji_nr_tu">
            	<img src="{{$v->news_pic}}" class="img-responsive">
            </div>
            @endif
            @endforeach
        </div>
    </div>	
</div>

<!--底部-->
@include('qt_foot')

</body>
</html>
                                                                                                  