<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{   
	public function education_concept(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $concept = DB::table('education_concept')->get();
        $data['concept'] = $concept;
        return view('education_concept',$data);
    }

    public function education_concept_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$sid = $id;
       	$concept = DB::table('education_concept')->where(['id'=>$sid])->get();
	    $data = [];
	    $data['concept'] = (array)$concept[0];
       	return view('education_concept_update',$data);
    }

    public function education_concept_doUpdate($id){
        $concept_c = $_POST['concept_c'];
        $concept_e = $_POST['concept_e'];
        $concept_index = $_POST['concept_index'];
        $concept_index_yd = $_POST['concept_index_yd'];
    	if($concept_c == ''){
            echo "<script>alert('中文理念不能为空')</script>";
            return self::education_concept_update($id);
        }else if($concept_e == ''){
            echo "<script>alert('英文理念不能为空')</script>";
            return self::education_concept_update($id);
        }else if($concept_index == ''){
            echo "<script>alert('pc端理念简介不能为空')</script>";
            return self::education_concept_update($id);
        }else if($concept_index_yd == ''){
            echo "<script>alert('移动端理念简介不能为空')</script>";
            return self::education_concept_update($id);
        }
        $num = DB::table('education_concept')->where('id',$id)->update(
                ['concept_c'=>$concept_c,
                'concept_e'=>$concept_e,
                'concept_index'=>$concept_index,
                'concept_index_yd'=>$concept_index_yd]
            );
        if($num == 1){
            echo "<script>alert('理念信息修改成功')</script>";
            return self::education_concept();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::education_concept_update($id);
        }
    }

    public function education_speak(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $speak = DB::table('education_speak')->get();
        $data['speak'] = $speak;
        return view('education_speak',$data);
    }

    public function education_speak_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $speak = DB::table('education_speak')->where(['id'=>$sid])->get();
        $data = [];
        $data['speak'] = (array)$speak[0];
        return view('education_speak_update',$data);
    }

    public function education_speak_doUpdate($id){
        $education_speak = $_POST['education_speak'];
        if($education_speak == ''){
            echo "<script>alert('安吉拉说文本不能为空')</script>";
            return self::education_speak_update($id);
        }
        $num = DB::table('education_speak')->where('id',$id)->update(
                ['education_speak'=>$education_speak]
            );
        if($num == 1){
            echo "<script>alert('安吉拉说文本修改成功')</script>";
            return self::education_speak();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::education_speak_update($id);
        }
    }

    public function education_team(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $team = DB::table('team_intro')->get();
        $data['team'] = $team;
        return view('education_team',$data);
    }

    public function education_team_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $team = DB::table('team_intro')->where(['id'=>$sid])->get();
        $data = [];
        $data['team'] = (array)$team[0];
        return view('education_team_update',$data);
    }

    public function education_team_doUpdate($id){
        $team_text = $_POST['team_text'];
        $team_pic = $_POST['team_pic'];
        $team_pic_yd = $_POST['team_pic_yd'];
        if($team_text == ''){
            echo "<script>alert('安吉拉团队文本不能为空')</script>";
            return self::education_team_update($id);
        }else if($team_pic == ''){
            echo "<script>alert('安吉拉团队pc端图片路径不能为空')</script>";
            return self::education_team_update($id);
        }else if($team_pic_yd == ''){
            echo "<script>alert('安吉拉团队移动端图片路径不能为空')</script>";
            return self::education_team_update($id);
        }
        $num = DB::table('team_intro')->where('id',$id)->update(
                ['team_text'=>$team_text,
                'team_pic'=>$team_pic,
                'team_pic_yd'=>$team_pic_yd]
            );
        if($num == 1){
            echo "<script>alert('安吉拉团队图文信息修改成功')</script>";
            return self::education_team();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::education_team_update($id);
        }
    }

    public function education_teacher(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $teacher = DB::table('team_teacher')->orderBy('id','asc')->get();
        return view('education_teacher',[
                'teacher'=>$teacher
            ]);
    }

    public function education_teacher_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('team_teacher')->where('id',$id)->delete();
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

    public function education_teacher_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('education_teacher_insert');
    }

    public function education_teacher_doInsert(){
        $name = $_POST['name'];
        $position = $_POST['position'];
        $academy = $_POST['academy'];
        $photo = $_POST['photo'];        
        if($name == ''){
            echo "<script>alert('教师姓名不能为空')</script>";
            return self::education_teacher_insert();
        }else if($position == ''){
            echo "<script>alert('教师职位不能为空')</script>";
            return self::education_teacher_insert();
        }else if($academy == ''){
            echo "<script>alert('教师毕业院校不能为空')</script>";
            return self::education_teacher_insert();
        }else if($photo == ''){
            echo "<script>alert('教师照片路径不能为空')</script>";
            return self::education_teacher_insert();
        }
        $bool = DB::table('team_teacher')->insert(
            ['name'=>$name,'position'=>$position,'academy'=>$academy,'photo'=>$photo]
            );
        if($bool){
                return redirect('/admin/education_teacher');
            }else{
                return redirect()->back();
            }
    }

    public function education_teacher_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $teacher = DB::table('team_teacher')->where('id',$id)->get();
        $data['teacher'] = (array)$teacher[0];
        return view('education_teacher_update',$data);
    }

    public function education_teacher_doUpdate($id){
        $name = $_POST['name'];
        $position = $_POST['position'];
        $academy = $_POST['academy'];
        $photo = $_POST['photo'];
        if($name == ''){
            echo "<script>alert('教师姓名不能为空')</script>";
            return self::education_teacher_update($id);
        }else if($position == ''){
                echo "<script>alert('教师职位不能为空')</script>";
                return self::education_teacher_update($id);
        }else if($academy == ''){
                echo "<script>alert('教师毕业院校不能为空')</script>";
                return self::education_teacher_update($id);
        }else if($photo == ''){
                echo "<script>alert('教师照片路径不能为空')</script>";
                return self::education_teacher_update($id);
        }
        $num = DB::table('team_teacher')->where('id',$id)->update(
            ['name'=>$name,'position'=>$position,'academy'=>$academy,'photo'=>$photo]
            );
        if($num == 1){
            return redirect('/admin/education_teacher');
        }else{
            return redirect()->back();
        }
    }



    public function culture(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $culture = DB::table('culture_classify')
            ->orderBy('id','asc')
            ->get();
        return view('admin_culture',[
                'culture'=>$culture
            ]);
    }

    public function culture_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $culture = DB::table('culture_classify')->where('id',$id)->get();
        $data['culture'] = (array)$culture[0];
        return view('admin_culture_update',$data);
    }

    public function culture_doUpdate($id){
        $culture_name_c = $_POST['culture_name_c'];
        $culture_name_e = $_POST['culture_name_e'];
        $culture_cover = $_POST['culture_cover'];
        $culture_intro = $_POST['culture_intro'];
        if($culture_name_c == ''){
            echo "<script>alert('文化中文名不能为空')</script>";
            return self::culture_update($id);
        }else if($culture_cover == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::culture_update($id);
        }else if($culture_intro == ''){
                echo "<script>alert('文化简介不能为空')</script>";
                return self::culture_update($id);
        }
        $num = DB::table('culture_classify')->where('id',$id)->update(
            ['culture_name_c'=>$culture_name_c,'culture_name_e'=>$culture_name_e,
            'culture_cover'=>$culture_cover,'culture_intro'=>$culture_intro]
            );
        if($num == 1){
            return redirect('/admin/culture');
        }else{
            return redirect()->back();
        }
    }

    public function culture_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //文化id
        $cid = $id;
        $data['cid'] = $cid;
        //文化名称
        $culture = DB::table('culture_classify')->where('id',$id)->pluck('culture_name_c');
        $data['culture'] = $culture;
        //标签
        $label = DB::table('culture_label')->where('culture_id',$id)->get();
        $data['label'] = $label;
        return view('admin_culture_label',$data);
    }

    public function culture_label_index_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('culture_label')->where('id',$id)->delete();
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

    public function culture_label_index_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['culture_id'] = $id;
        return view('admin_culture_label_insert',$data);
    }

    public function culture_label_index_doInsert(){
        $label_name = $_POST['label_name'];
        $culture_id = $_POST['culture_id'];
        $num = DB::table('culture_classify')->where('id',$culture_id)->get();
        if($num){
            $bool = DB::table('culture_label')->insert(
                ['label_name'=>$label_name,'culture_id'=>$culture_id]
                );
            if($bool){
                    return redirect('/admin/culture/label/'.$culture_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('课程id不存在')</script>";
            return self::teaching_yt_label_insert($feature_id);            
        }
    }

    public function culture_label_index_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('culture_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_culture_label_update',$data);
    }

    public function culture_label_index_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('文化标签不能为空')</script>";
            return self::culture_label_index_update($id);
        }
        $num = DB::table('culture_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/culture/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function culture_label_index_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('culture_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_culture_label_details',$data);
    }

    public function culture_label_index_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('culture_label_index')->where('id',$id)->delete();
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

    public function culture_label_index_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_culture_label_index_pic_insert',$data);
    }

    public function culture_label_index_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('culture_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('culture_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/culture/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::culture_label_index_label_details_pic_insert($label_id);            
        }
    }

    public function culture_label_index_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_culture_label_index_text_insert',$data);
    }

    public function culture_label_index_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('culture_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('culture_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/culture/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::culture_label_index_label_details_text_insert($label_id);            
        }
    }

    public function culture_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('culture_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_culture_label_index_details_update',$data);
    }

    public function culture_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('culture_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/culture/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }

}