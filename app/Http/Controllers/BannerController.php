<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{   
	public function banner_pic(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $banner = DB::table('anjila_banner')->orderBy('id','asc')->get();
        $data['banner'] = $banner;
        return view('banner',$data);
    }

    public function banner_pic_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$bid = $id;
       	$banner_data = DB::table('anjila_banner')->where(['id'=>$bid])->get();
	    $data = [];
	    $data['banner_data'] = (array)$banner_data[0];
       	return view('banner_update',$data);
    }

    public function banner_pic_doUpdate($id){
    	$bpath = $_POST['bpath'];
    	if($bpath == ''){
            echo "<script>alert('banner图路径不能为空')</script>";
            return self::banner_pic_update($id);
        }
        $num = DB::table('anjila_banner')->where('id',$id)->update(
                ['banner_path'=>$bpath]
            );
        if($num == 1){
            echo "<script>alert('banner图修改成功')</script>";
            return self::banner_pic();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::banner_pic_update($id);
        }
    }

}