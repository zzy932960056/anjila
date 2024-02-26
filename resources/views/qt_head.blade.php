<div class="container-fluid">
	<ul class="index_daohang">
    	<li class="index_daohang_li1"><a href="/"><img src="{{URL::asset('/images/daohang/xiongmao.png')}}" class="img-responsive index_daohang_img">首页</a></li>
    	<li class="index_daohang_li2"><a href="/teaching_yt"><img src="{{URL::asset('/images/daohang/mao.png')}}" class="img-responsive index_daohang_img">教学特色</a></li>
    	<li class="index_daohang_li3"><a href="/culture"><img src="{{URL::asset('/images/daohang/laihama.png')}}" class="img-responsive index_daohang_img">安吉拉文化</a></li>
    	<li><a href="/"><img src="{{URL::asset('/images/logo.png')}}" class="img-responsive index_daohang_logo"></a></li>
    	<li class="index_daohang_li4"><a href="/news_sh"><img src="{{URL::asset('/images/daohang/xiong.png')}}" class="img-responsive index_daohang_img">园所动态</a></li>
    	<li class="index_daohang_li5"><a href="/curriculum"><img src="{{URL::asset('/images/daohang/tuzi.png')}}" class="img-responsive index_daohang_img">常青藤课程</a></li>
    	<li class="index_daohang_li6"><a href="/about"><img src="{{URL::asset('/images/daohang/huli.png')}}" class="img-responsive index_daohang_img">关于我们</a></li>
    </ul>
</div>
<script>
	$(".index_daohang_li1").mouseover(function(){
		$(".index_daohang_li1 img").attr("src","{{URL::asset('/images/daohang/xiongmao_hua.png')}}");
		})
	$(".index_daohang_li1").mouseleave(function(){
		$(".index_daohang_li1 img").attr("src","{{URL::asset('/images/daohang/xiongmao.png')}}");
		})
		
	$(".index_daohang_li2").mouseover(function(){
		$(".index_daohang_li2 img").attr("src","{{URL::asset('/images/daohang/mao_hua.png')}}");
		})
	$(".index_daohang_li2").mouseleave(function(){
		$(".index_daohang_li2 img").attr("src","{{URL::asset('/images/daohang/mao.png')}}");
		})
		
	$(".index_daohang_li3").mouseover(function(){
		$(".index_daohang_li3 img").attr("src","{{URL::asset('/images/daohang/laihama_hua.png')}}");
		})
	$(".index_daohang_li3").mouseleave(function(){
		$(".index_daohang_li3 img").attr("src","{{URL::asset('/images/daohang/laihama.png')}}");
		})
		
	$(".index_daohang_li4").mouseover(function(){
		$(".index_daohang_li4 img").attr("src","{{URL::asset('/images/daohang/xiong_hua.png')}}");
		})
	$(".index_daohang_li4").mouseleave(function(){
		$(".index_daohang_li4 img").attr("src","{{URL::asset('/images/daohang/xiong.png')}}");
		})
		
	$(".index_daohang_li5").mouseover(function(){
		$(".index_daohang_li5 img").attr("src","{{URL::asset('/images/daohang/tuzi_hua.png')}}");
		})
	$(".index_daohang_li5").mouseleave(function(){
		$(".index_daohang_li5 img").attr("src","{{URL::asset('/images/daohang/tuzi.png')}}");
		})
		
	$(".index_daohang_li6").mouseover(function(){
		$(".index_daohang_li6 img").attr("src","{{URL::asset('/images/daohang/huli_hua.png')}}");
		})
	$(".index_daohang_li6").mouseleave(function(){
		$(".index_daohang_li6 img").attr("src","{{URL::asset('/images/daohang/huli.png')}}");
		})
	})
	
</script>
