<a href="/"><div class="container-fluid index_logo"><img src="{{URL::asset('/images_yd/logo2.png')}}" class="img-responsive"></div></a>
<div class="container-fluid index_banner_da">
    	  <div id="myCarousel" class="carousel slide pad_010 b_k">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                @foreach($banner as $k => $v)
                @if($k == 0)
                <li data-target="#myCarousel" data-slide-to="{{$k}}" class="active"></li>
                @else
                <li data-target="#myCarousel" data-slide-to="{{$k}}"></li>
                @endif
                @endforeach
            </ol>   
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner bor_btm">
                @foreach($banner as $k => $v)
                @if($k == 0)
                <div class="item active">
  		              <div class="index_banner{{$k}}">
                    </div>
                </div>
                @else
                <div class="item">
  		              <div class="index_banner{{$k}}">
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <style>
                @foreach($banner as $k => $v)
                .index_banner{{$k}}{width:100%; height:350px; background: url({{$v->banner_path}}) no-repeat center center; background-size:cover; padding:0;}
                @endforeach
            </style>
        </div>
</div>