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
            <p class="jxte_sanji_mbx">当前位置:<a href="/">首页</a>><a href="/culture">安吉拉文化</a>><a href="#">{{$culture[0]->culture_name_c}}</a></p>
		</div>
        <div class="row jxts_sanji_dafangzi">
        	<div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_xiaotu"><img src="{{URL::asset('/images/ajlwh_sanji_tu1.png')}}" class="img-responsive"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_bt"><p><span>{{$culture[0]->culture_name_c}}<b>{{$culture[0]->culture_name_e}}</b></span></p></div>
            <div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_jiansuo">
                @foreach($label as $k => $v)
            	<a href="#module{{$v->id}}" style="color:#5b483a !important"><span><img src="{{URL::asset('/images/jxts_sanji_tu2.png')}}" class="img-responsive">{{$v->label_name}}</span></a>
                @endforeach
            </div>
            @foreach($label_details as $k => $v)
            <div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_xiaobt" id="module{{$v->id}}">
                {{$v->label_name}}
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 jxts_sanji_nr">
                @foreach($v->details as $de)
                @if($de->label_pic)
                <div class="jxts_sanji_nr_tu"><img src="{{$de->label_pic}}" class="img-responsive"></div>
                @endif
                @if($de->label_text)
                <p>
                    {{$de->label_text}}
                </p>
                @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </div>	
</div>

<!--底部-->
@include('qt_foot')

</body>
</html>
                                                                                                  