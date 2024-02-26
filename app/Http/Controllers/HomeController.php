<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{   
	public function culture_cover(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('home_culture')->get();
        $data['info'] = $info;
        return view('home_culture',$data);
    }

    public function culture_cover_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$sid = $id;
       	$culture_cover = DB::table('home_culture')->where(['id'=>$sid])->get();
	    $data = [];
	    $data['culture_cover'] = (array)$culture_cover[0];
       	return view('home_culture_update',$data);
    }

    public function culture_cover_doUpdate($id){
        $cover_pic = $_POST['cover_pic'];
        $cover_sort = $_POST['cover_sort'];
    	if($cover_pic == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::culture_cover_update($id);
        }
        $num = DB::table('home_culture')->where('id',$id)->update(
                ['cover_pic'=>$cover_pic]
            );
        if($num == 1){
            echo "<script>alert('信息修改成功')</script>";
            return self::culture_cover();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::culture_cover_update($id);
        }
    }

    public function last_pic(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('home_last_pic')->get();
        $data['info'] = $info;
        return view('home_last_pic',$data);
    }

    public function last_pic_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $last_pic = DB::table('home_last_pic')->where(['id'=>$sid])->get();
        $data = [];
        $data['last_pic'] = (array)$last_pic[0];
        return view('home_last_pic_update',$data);
    }

    public function last_pic_doUpdate($id){
        $pic_path = $_POST['pic_path'];
        if($pic_path == ''){
            echo "<script>alert('底部图片路径不能为空')</script>";
            return self::last_pic_update($id);
        }
        $num = DB::table('home_last_pic')->where('id',$id)->update(
                ['pic_path'=>$pic_path]
            );
        if($num == 1){
            echo "<script>alert('信息修改成功')</script>";
            return self::last_pic();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::last_pic_update($id);
        }
    }
}