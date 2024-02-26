<div class="container-fluid index_dibu">
    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0">
		<img src="{{URL::asset('/images_yd/index_dibu_bg.png')}}" class="img-responsive" style="width:100%">
        <img src="{{URL::asset('/images_yd/index_dibu_tutop.png')}}" class="img-responsive" id="toTop">
        <div class="index_dibu_dizhi">
            <ul>
                <li>{{$company_info[0]->company_address}}</li>
                <li>TEL:{{$company_info[0]->company_tel}}</li>
            </ul>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 index_dibu_beian" style="padding:0">
    	copyright@anjel{{$company_info[0]->archival_info}}
    </div>
</div>