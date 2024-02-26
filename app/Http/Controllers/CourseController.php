<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{   
	public function curriculum_idea(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $c_idea = DB::table('curriculum_idea')->orderBy('id','asc')->get();
        $data['c_idea'] = $c_idea;
        return view('course_c_idea',$data);
    }

    public function curriculum_idea_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$bid = $id;
       	$idea_text = DB::table('curriculum_idea')->where(['id'=>$bid])->get();
	    $data = [];
	    $data['idea_text'] = (array)$idea_text[0];
       	return view('course_c_idea_text',$data);
    }

    public function curriculum_idea_text_doUpdate($id){
    	$text1 = $_POST['text1'];
        $text2 = $_POST['text2'];
        $text3 = $_POST['text3'];
        $text4 = $_POST['text4'];
        $num = DB::table('curriculum_idea')->where('id',$id)->update(
                ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3,'text4'=>$text4]
            );
        if($num == 1){
            echo "<script>alert('文本修改成功')</script>";
            return self::curriculum_idea();
        }else{
            echo "<script>alert('文本未修改')</script>";
            return self::curriculum_idea_text_update($id);
        }
    }

    public function curriculum_idea_pic_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $bid = $id;
        $idea_pic = DB::table('curriculum_idea')->where(['id'=>$bid])->get();
        $data = [];
        $data['idea_pic'] = (array)$idea_pic[0];
        return view('course_c_idea_pic',$data);
    }

    public function curriculum_idea_pic_doUpdate($id){
        $pic1 = $_POST['pic1'];
        $pic2 = $_POST['pic2'];
        $pic3 = $_POST['pic3'];
        $num = DB::table('curriculum_idea')->where('id',$id)->update(
                ['pic1'=>$pic1,'pic2'=>$pic2,'pic3'=>$pic3]
            );
        if($num == 1){
            echo "<script>alert('图片路径修改成功')</script>";
            return self::curriculum_idea();
        }else{
            echo "<script>alert('图片路径未修改')</script>";
            return self::curriculum_idea_pic_update($id);
        }
    }

    public function paragraph_idea(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $paragraph = DB::table('curriculum_paragraph')->orderBy('id','asc')->get();
        $data['paragraph'] = $paragraph;
        return view('curriculum_paragraph',$data);
    }

    public function paragraph_idea_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $bid = $id;
        $paragraph = DB::table('curriculum_paragraph')->where(['id'=>$bid])->get();
        $data = [];
        $data['paragraph'] = (array)$paragraph[0];
        return view('curriculum_paragraph_update',$data);
    }

    public function paragraph_idea_doUpdate($id){
        $paragraph_idea = $_POST['paragraph_idea'];
        if($paragraph_idea == ''){
            echo "<script>alert('段落文本不能为空')</script>";
            return self::paragraph_idea_update($id);
        }
        $num = DB::table('curriculum_paragraph')->where('id',$id)->update(
                ['paragraph_idea'=>$paragraph_idea]
            );
        if($num == 1){
            echo "<script>alert('段落文本修改成功')</script>";
            return self::paragraph_idea();
        }else{
            echo "<script>alert('文本未修改')</script>";
            return self::paragraph_idea_update($id);
        }
    }

    public function consultative_course_text(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('consultative_course_text')->orderBy('id','asc')->get();
        $data['course'] = $course;
        return view('consultative_course_text',$data);
    }

    public function consultative_course_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $bid = $id;
        $course = DB::table('consultative_course_text')->where(['id'=>$bid])->get();
        $data = [];
        $data['course'] = (array)$course[0];
        return view('consultative_course_text_update',$data);
    }

    public function consultative_course_text_doUpdate($id){
        $text1 = $_POST['text1'];
        $text2 = $_POST['text2'];
        $text3 = $_POST['text3'];
        $num = DB::table('consultative_course_text')->where('id',$id)->update(
                ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3]
            );
        if($num == 1){
            echo "<script>alert('文本修改成功')</script>";
            return self::consultative_course_text();
        }else{
            echo "<script>alert('文本未修改')</script>";
            return self::consultative_course_text_update($id);
        }
    }



    public function consultative_course_paragraph(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('consultative_course_paragraph')->orderBy('id','asc')->get();
        $data['course'] = $course;
        return view('consultative_course_paragraph',$data);
    }

    public function consultative_course_paragraph_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $bid = $id;
        $course = DB::table('consultative_course_paragraph')->where(['id'=>$bid])->get();
        $data = [];
        $data['course'] = (array)$course[0];
        return view('consultative_course_paragraph_update',$data);
    }

    public function consultative_course_paragraph_doUpdate($id){
        $paragraph = $_POST['paragraph'];
        $num = DB::table('consultative_course_paragraph')->where('id',$id)->update(
                ['paragraph'=>$paragraph]
            );
        if($num == 1){
            echo "<script>alert('文本修改成功')</script>";
            return self::consultative_course_paragraph();
        }else{
            echo "<script>alert('文本未修改')</script>";
            return self::consultative_course_paragraph_update($id);
        }
    }
    
    public function consultative_course_image_text(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $course = DB::table('consultative_course_carousel')->orderBy('id','asc')->get();
        return view('consultative_course_carousel',[
                'course'=>$course
            ]);
    }

    public function consultative_course_image_text_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('consultative_course_carousel')->where('id',$id)->delete();
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

    public function consultative_course_image_text_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('consultative_course_carousel_insert');
    }

    public function consultative_course_image_text_doInsert(){
        $carousel_pic = $_POST['carousel_pic'];
        $carousel_text = $_POST['carousel_text'];
        if($carousel_pic == ''){
            echo "<script>alert('轮播图路径不能为空')</script>";
            return self::consultative_course_image_text_insert();
        }else if($carousel_text == ''){
            echo "<script>alert('轮播图文本不能为空')</script>";
            return self::consultative_course_image_text_insert();
        }
        $bool = DB::table('consultative_course_carousel')->insert(
            ['carousel_pic'=>$carousel_pic,'carousel_text'=>$carousel_text]
            );
        if($bool){
                return redirect('/admin/consultative_course/image_text');
            }else{
                return redirect()->back();
            }
    }

    public function consultative_course_image_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $course = DB::table('consultative_course_carousel')->where('id',$id)->get();
        $data['course'] = (array)$course[0];
        return view('consultative_course_carousel_update',$data);
    }

    public function consultative_course_image_text_doUpdate($id){
        $carousel_pic = $_POST['carousel_pic'];
        $carousel_text = $_POST['carousel_text'];
        if($carousel_pic == ''){
            echo "<script>alert('轮播图路径不能为空')</script>";
            return self::consultative_course_image_text_update($id);
        }else if($carousel_text == ''){
                echo "<script>alert('轮播图文本不能为空')</script>";
                return self::consultative_course_image_text_update($id);
        }
        $num = DB::table('consultative_course_carousel')->where('id',$id)->update(
            ['carousel_pic'=>$carousel_pic,'carousel_text'=>$carousel_text]
            );
        if($num == 1){
            return redirect('/admin/consultative_course/image_text');
        }else{
            return redirect()->back();
        }
    }

}