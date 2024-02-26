<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TeachingController extends Controller
{   
    public function teaching_yt(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $course = DB::table('teaching_feature')
            ->where('course_sort','亿童课程')
            ->orderBy('id','asc')
            ->get();
        return view('admin_teaching_yt',[
                'course'=>$course
            ]);
    }

    public function teaching_yt_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature')->where('id',$id)->delete();
        if($num == 1){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_yt_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_teaching_yt_insert');
    }

    public function teaching_yt_doInsert(){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        if($course_name_c == ''){
            echo "<script>alert('课程名称不能为空')</script>";
            return self::teaching_yt_insert();
        }else if($course_cover_pic == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::teaching_yt_insert();
        }
        $bool = DB::table('teaching_feature')->insert(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_sort'=>'亿童课程','course_sign'=>'yt',
            'a_link'=>'/teaching_yt','course_cover_pic'=>$course_cover_pic]
            );
        if($bool){
                return redirect('/admin/teaching_yt');
            }else{
                return redirect()->back();
            }
    }

    public function teaching_yt_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('teaching_feature')->where('id',$id)->get();
        $data['course'] = (array)$course[0];
        return view('admin_teaching_yt_update',$data);
    }

    public function teaching_yt_doUpdate($id){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        $course_sort = $_POST['course_sort'];
        if($course_name_c == ''){
            echo "<script>alert('课程中文名不能为空')</script>";
            return self::teaching_yt_update($id);
        }else if($course_cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::teaching_yt_update($id);
        }
        $num = DB::table('teaching_feature')->where('id',$id)->update(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_cover_pic'=>$course_cover_pic,'course_sort'=>$course_sort]
            );
        if($num == 1){
            return redirect('/admin/teaching_yt');
        }else{
            return redirect()->back();
        }
    }

    public function teaching_yt_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //课程id
        $cid = $id;
        $data['cid'] = $cid;
        //课程名称
        $course = DB::table('teaching_feature')->where('id',$id)->pluck('course_name_c');
        $data['course'] = $course;
        //标签
        $label = DB::table('teaching_feature_label')->where('feature_id',$id)->get();
        $data['label'] = $label;
        return view('admin_teaching_label_yt',$data);
    }

    public function teaching_yt_label_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_yt_label_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['feature_id'] = $id;
        return view('admin_teaching_label_yt_insert',$data);
    }

    public function teaching_yt_label_doInsert(){
        $label_name = $_POST['label_name'];
        $feature_id = $_POST['feature_id'];
        $num = DB::table('teaching_feature')->where('id',$feature_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label')->insert(
                ['label_name'=>$label_name,'feature_id'=>$feature_id]
                );
            if($bool){
                    return redirect('/admin/teaching_yt/label/'.$feature_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('课程id不存在')</script>";
            return self::teaching_yt_label_insert($feature_id);            
        }
    }

    public function teaching_yt_label_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('teaching_feature_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_teaching_label_yt_update',$data);
    }

    public function teaching_yt_label_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('课程标签不能为空')</script>";
            return self::teaching_yt_label_update($id);
        }
        $num = DB::table('teaching_feature_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/teaching_yt/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_yt_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_teaching_label_yt_details',$data);
    }

    public function teaching_yt_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_yt_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_yt_details_pic_insert',$data);
    }

    public function teaching_yt_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_yt/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_yt_label_details_pic_insert($label_id);            
        }
    }

    public function teaching_yt_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_yt_details_text_insert',$data);
    }

    public function teaching_yt_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_yt/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_yt_label_details_text_insert($label_id);            
        }
    }

    public function teaching_yt_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_teaching_label_yt_details_update',$data);
    }

    public function teaching_yt_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/teaching_yt/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_bl(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $course = DB::table('teaching_feature')
            ->where('course_sort','布朗课程')
            ->orderBy('id','asc')
            ->get();
        return view('admin_teaching_bl',[
                'course'=>$course
            ]);
    }

    public function teaching_bl_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature')->where('id',$id)->delete();
        if($num == 1){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_bl_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_teaching_bl_insert');
    }

    public function teaching_bl_doInsert(){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        if($course_name_c == ''){
            echo "<script>alert('课程名称不能为空')</script>";
            return self::teaching_yt_insert();
        }else if($course_cover_pic == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::teaching_yt_insert();
        }
        $bool = DB::table('teaching_feature')->insert(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_sort'=>'布朗课程','course_sign'=>'bl',
            'a_link'=>'/teaching_bl','course_cover_pic'=>$course_cover_pic]
            );
        if($bool){
                return redirect('/admin/teaching_bl');
            }else{
                return redirect()->back();
            }
    }

    public function teaching_bl_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('teaching_feature')->where('id',$id)->get();
        $data['course'] = (array)$course[0];
        return view('admin_teaching_bl_update',$data);
    }

    public function teaching_bl_doUpdate($id){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        $course_sort = $_POST['course_sort'];
        if($course_name_c == ''){
            echo "<script>alert('课程中文名不能为空')</script>";
            return self::teaching_bl_update($id);
        }else if($course_cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::teaching_bl_update($id);
        }
        $num = DB::table('teaching_feature')->where('id',$id)->update(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_cover_pic'=>$course_cover_pic,'course_sort'=>$course_sort]
            );
        if($num == 1){
            return redirect('/admin/teaching_bl');
        }else{
            return redirect()->back();
        }
    }

    public function teaching_bl_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //课程id
        $cid = $id;
        $data['cid'] = $cid;
        //课程名称
        $course = DB::table('teaching_feature')->where('id',$id)->pluck('course_name_c');
        $data['course'] = $course;
        //标签
        $label = DB::table('teaching_feature_label')->where('feature_id',$id)->get();
        $data['label'] = $label;
        return view('admin_teaching_label_bl',$data);
    }

    public function teaching_bl_label_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_bl_label_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['feature_id'] = $id;
        return view('admin_teaching_label_bl_insert',$data);
    }

    public function teaching_bl_label_doInsert(){
        $label_name = $_POST['label_name'];
        $feature_id = $_POST['feature_id'];
        $num = DB::table('teaching_feature')->where('id',$feature_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label')->insert(
                ['label_name'=>$label_name,'feature_id'=>$feature_id]
                );
            if($bool){
                    return redirect('/admin/teaching_bl/label/'.$feature_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('课程id不存在')</script>";
            return self::teaching_bl_label_insert($feature_id);            
        }
    }

    public function teaching_bl_label_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('teaching_feature_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_teaching_label_bl_update',$data);
    }

    public function teaching_bl_label_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('课程标签不能为空')</script>";
            return self::teaching_bl_label_update($id);
        }
        $num = DB::table('teaching_feature_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/teaching_bl/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_bl_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_teaching_label_bl_details',$data);
    }

    public function teaching_bl_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_bl_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_bl_details_pic_insert',$data);
    }

    public function teaching_bl_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_bl/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_bl_label_details_pic_insert($label_id);            
        }
    }

    public function teaching_bl_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_bl_details_text_insert',$data);
    }

    public function teaching_bl_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_bl/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_bl_label_details_text_insert($label_id);            
        }
    }

    public function teaching_bl_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_teaching_label_bl_details_update',$data);
    }

    public function teaching_bl_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/teaching_bl/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_ys(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $course = DB::table('teaching_feature')
            ->where('course_sort','艺术创想')
            ->orderBy('id','asc')
            ->get();
        return view('admin_teaching_ys',[
                'course'=>$course
            ]);
    }

    public function teaching_ys_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature')->where('id',$id)->delete();
        if($num == 1){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_ys_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_teaching_ys_insert');
    }

    public function teaching_ys_doInsert(){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        if($course_name_c == ''){
            echo "<script>alert('课程名称不能为空')</script>";
            return self::teaching_ys_insert();
        }else if($course_cover_pic == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::teaching_ys_insert();
        }
        $bool = DB::table('teaching_feature')->insert(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_sort'=>'艺术幻想','course_sign'=>'ys',
            'a_link'=>'/teaching_ys','course_cover_pic'=>$course_cover_pic]
            );
        if($bool){
                return redirect('/admin/teaching_ys');
            }else{
                return redirect()->back();
            }
    }

    public function teaching_ys_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('teaching_feature')->where('id',$id)->get();
        $data['course'] = (array)$course[0];
        return view('admin_teaching_ys_update',$data);
    }

    public function teaching_ys_doUpdate($id){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        $course_sort = $_POST['course_sort'];
        if($course_name_c == ''){
            echo "<script>alert('课程中文名不能为空')</script>";
            return self::teaching_ys_update($id);
        }else if($course_cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::teaching_ys_update($id);
        }
        $num = DB::table('teaching_feature')->where('id',$id)->update(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_cover_pic'=>$course_cover_pic,'course_sort'=>$course_sort]
            );
        if($num == 1){
            return redirect('/admin/teaching_ys');
        }else{
            return redirect()->back();
        }
    }

    public function teaching_ys_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //课程id
        $cid = $id;
        $data['cid'] = $cid;
        //课程名称
        $course = DB::table('teaching_feature')->where('id',$id)->pluck('course_name_c');
        $data['course'] = $course;
        //标签
        $label = DB::table('teaching_feature_label')->where('feature_id',$id)->get();
        $data['label'] = $label;
        return view('admin_teaching_label_ys',$data);
    }

    public function teaching_ys_label_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_ys_label_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['feature_id'] = $id;
        return view('admin_teaching_label_ys_insert',$data);
    }

    public function teaching_ys_label_doInsert(){
        $label_name = $_POST['label_name'];
        $feature_id = $_POST['feature_id'];
        $num = DB::table('teaching_feature')->where('id',$feature_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label')->insert(
                ['label_name'=>$label_name,'feature_id'=>$feature_id]
                );
            if($bool){
                    return redirect('/admin/teaching_ys/label/'.$feature_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('课程id不存在')</script>";
            return self::teaching_ys_label_insert($feature_id);            
        }
    }

    public function teaching_ys_label_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('teaching_feature_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_teaching_label_ys_update',$data);
    }

    public function teaching_ys_label_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('课程标签不能为空')</script>";
            return self::teaching_ys_label_update($id);
        }
        $num = DB::table('teaching_feature_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/teaching_ys/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_ys_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_teaching_label_ys_details',$data);
    }

    public function teaching_ys_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_ys_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_ys_details_pic_insert',$data);
    }

    public function teaching_ys_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_ys/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_ys_label_details_pic_insert($label_id);            
        }
    }

    public function teaching_ys_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_ys_details_text_insert',$data);
    }

    public function teaching_ys_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_ys/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_ys_label_details_text_insert($label_id);            
        }
    }

    public function teaching_ys_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_teaching_label_ys_details_update',$data);
    }

    public function teaching_ys_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/teaching_ys/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_zj(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $course = DB::table('teaching_feature')
            ->where('course_sort','安吉拉早教')
            ->orderBy('id','asc')
            ->get();
        return view('admin_teaching_zj',[
                'course'=>$course
            ]);
    }

    public function teaching_zj_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature')->where('id',$id)->delete();
        if($num == 1){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_zj_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_teaching_zj_insert');
    }

    public function teaching_zj_doInsert(){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        if($course_name_c == ''){
            echo "<script>alert('课程名称不能为空')</script>";
            return self::teaching_zj_insert();
        }else if($course_cover_pic == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::teaching_zj_insert();
        }
        $bool = DB::table('teaching_feature')->insert(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_sort'=>'安吉拉早教','course_sign'=>'zj',
            'a_link'=>'/teaching_zj','course_cover_pic'=>$course_cover_pic]
            );
        if($bool){
                return redirect('/admin/teaching_zj');
            }else{
                return redirect()->back();
            }
    }

    public function teaching_zj_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('teaching_feature')->where('id',$id)->get();
        $data['course'] = (array)$course[0];
        return view('admin_teaching_zj_update',$data);
    }

    public function teaching_zj_doUpdate($id){
        $course_name_c = $_POST['course_name_c'];
        $course_name_e = $_POST['course_name_e'];
        $course_cover_pic = $_POST['course_cover_pic'];
        $course_sort = $_POST['course_sort'];
        if($course_name_c == ''){
            echo "<script>alert('课程中文名不能为空')</script>";
            return self::teaching_zj_update($id);
        }else if($course_cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::teaching_zj_update($id);
        }
        $num = DB::table('teaching_feature')->where('id',$id)->update(
            ['course_name_c'=>$course_name_c,'course_name_e'=>$course_name_e,
            'course_cover_pic'=>$course_cover_pic,'course_sort'=>$course_sort]
            );
        if($num == 1){
            return redirect('/admin/teaching_zj');
        }else{
            return redirect()->back();
        }
    }

    public function teaching_zj_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //课程id
        $cid = $id;
        $data['cid'] = $cid;
        //课程名称
        $course = DB::table('teaching_feature')->where('id',$id)->pluck('course_name_c');
        $data['course'] = $course;
        //标签
        $label = DB::table('teaching_feature_label')->where('feature_id',$id)->get();
        $data['label'] = $label;
        return view('admin_teaching_label_zj',$data);
    }

    public function teaching_zj_label_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_zj_label_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['feature_id'] = $id;
        return view('admin_teaching_label_zj_insert',$data);
    }

    public function teaching_zj_label_doInsert(){
        $label_name = $_POST['label_name'];
        $feature_id = $_POST['feature_id'];
        $num = DB::table('teaching_feature')->where('id',$feature_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label')->insert(
                ['label_name'=>$label_name,'feature_id'=>$feature_id]
                );
            if($bool){
                    return redirect('/admin/teaching_zj/label/'.$feature_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('课程id不存在')</script>";
            return self::teaching_zj_label_insert($feature_id);            
        }
    }

    public function teaching_zj_label_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('teaching_feature_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_teaching_label_zj_update',$data);
    }

    public function teaching_zj_label_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('课程标签不能为空')</script>";
            return self::teaching_zj_label_update($id);
        }
        $num = DB::table('teaching_feature_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/teaching_zj/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function teaching_zj_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_teaching_label_zj_details',$data);
    }

    public function teaching_zj_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->delete();
        if($num){
            return new JsonResponse(
                    array('msg' => 'ok')
                );
        }else{
            return new JsonResponse(
                    array('msg' => 'no')
                );
        }
    }

    public function teaching_zj_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_zj_details_pic_insert',$data);
    }

    public function teaching_zj_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_zj/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_zj_label_details_pic_insert($label_id);            
        }
    }

    public function teaching_zj_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_teaching_label_zj_details_text_insert',$data);
    }

    public function teaching_zj_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('teaching_feature_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/teaching_zj/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::teaching_zj_label_details_text_insert($label_id);            
        }
    }

    public function teaching_zj_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('teaching_feature_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_teaching_label_zj_details_update',$data);
    }

    public function teaching_zj_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('teaching_feature_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/teaching_zj/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }



}