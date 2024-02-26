<div class="container-fluid index_dibu_daceng">
	<img src="{{URL::asset('/images/index_dibu.png')}}" class=" img-responsive" style="width:100%">
    <div class="index_dibu_dizhi">
    	<ul>
        	<li>{{$company_info[0]->company_address}}</li>
        	<li>TEL:{{$company_info[0]->company_tel}}</li>
        </ul>
        <p>copyright@anjel{{$company_info[0]->archival_info}}</p>
    </div>
    <div class="index_dibu_gongzai_ceng">
    	<div class="index_dibu_gongzai_erweima"><img src="{{$company_info[0]->qr_code}}" class="img-responsive"></div>
        <img src="{{URL::asset('/images/index_dibu_gongzai1.png')}}" class="img-responsive index_dibu_gongzai1">
        <img src="{{URL::asset('/images/index_dibu_gongzai2.png')}}" class="img-responsive index_dibu_gongzai2" id="toTop">
    </div>
</div>
<script>
$(function(){
    $(".index_dibu_gongzai1").mouseover(function(){
        $(".index_dibu_gongzai1").attr("src","{{URL::asset('/images/index_dibu_gongzai1.gif')}}");
        })
    $(".index_dibu_gongzai1").mouseleave(function(){
        $(".index_dibu_gongzai1").attr("src","{{URL::asset('/images/index_dibu_gongzai1.png')}}");
        })
    $(".index_dibu_gongzai2").mouseover(function(){
        $(".index_dibu_gongzai2").attr("src","{{URL::asset('/images/index_dibu_gongzai2.gif')}}");
        })
    $(".index_dibu_gongzai2").mouseleave(function(){
        $(".index_dibu_gongzai2").attr("src","{{URL::asset('/images/index_dibu_gongzai2.png')}}");
        })
    $(".index_dibu_gongzai1").click(function(){
        $(".index_dibu_gongzai_erweima").toggle();
        })
    $("#toTop").click(function(){
        var qiqiu=$(".index_dibu_gongzai2");
            qiqiu.animate({bottom:'600px'},500);
            qiqiu.animate({bottom:'0px'},2000);
        setTimeout(function(){
            $("html,body").animate({scrollTop:0},1500);
            return false;
        },500);
    })
})
</script>