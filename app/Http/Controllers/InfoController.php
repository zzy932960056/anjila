<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{   
	public function info_index(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('company_info')->get();
        $data['info'] = $info;
        return view('company_info',$data);
    }

    public function info_index_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$sid = $id;
       	$company_info = DB::table('company_info')->where(['id'=>$sid])->get();
	    $data = [];
	    $data['company_info'] = (array)$company_info[0];
       	return view('company_info_update',$data);
    }

    public function info_index_doUpdate($id){
        $company_address = $_POST['company_address'];
        $company_tel = $_POST['company_tel'];
        $archival_info = $_POST['archival_info'];
        $qr_code = $_POST['qr_code'];
    	if($company_address == ''){
            echo "<script>alert('安吉拉地址不能为空')</script>";
            return self::info_index_update($id);
        }else if($company_tel == ''){
            echo "<script>alert('安吉拉电话不能为空')</script>";
            return self::info_index_update($id);
        }else if($archival_info == ''){
            echo "<script>alert('网站备案号不能为空')</script>";
            return self::info_index_update($id);
        }else if($qr_code == ''){
            echo "<script>alert('二维码路径不能为空')</script>";
            return self::info_index_update($id);
        }
        $num = DB::table('company_info')->where('id',$id)->update(
                ['company_address'=>$company_address,
                'company_tel'=>$company_tel,
                'archival_info'=>$archival_info,
                'qr_code'=>$qr_code]
            );
        if($num == 1){
            echo "<script>alert('信息修改成功')</script>";
            return self::info_index();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::info_index_update($id);
        }
    }
}