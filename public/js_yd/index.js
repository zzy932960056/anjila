// JavaScript Document
/*首页*/



$(function(){

	$("#html").click(function(){
	$("html").toggleClass('html');
	})	

})


$(function(){

	$("#toTop").click(function(){
		var qiqiu=$("#toTop");
			qiqiu.animate({top:'-40vh'},500);
			qiqiu.animate({top:'0'},2000);

		setTimeout(function(){
			$("html,body").animate({scrollTop:0},1500);
			return true;
    	},500);

	})
})













