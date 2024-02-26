<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{   
	public function about_us(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('about_anjila')->get();
        $data['info'] = $info;
        return view('admin_about_anjila',$data);
    }

    public function about_us_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
    	$sid = $id;
       	$info = DB::table('about_anjila')->where(['id'=>$sid])->get();
	    $data = [];
	    $data['info'] = (array)$info[0];
       	return view('admin_about_anjila_update',$data);
    }

    public function about_us_doUpdate($id){
        $about_title = $_POST['about_title'];
        $about_text = $_POST['about_text'];
        $about_text_yd = $_POST['about_text_yd'];
    	if($about_title == ''){
            echo "<script>alert('关于安吉拉标题不能为空')</script>";
            return self::about_us_update($id);
        }else if($about_text == ''){
            echo "<script>alert('关于安吉拉pc端文本不能为空')</script>";
            return self::about_us_update($id);
        }else if($about_text_yd == ''){
            echo "<script>alert('关于安吉拉移动端文本不能为空')</script>";
            return self::about_us_update($id);
        }
        $num = DB::table('about_anjila')->where('id',$id)->update(
                ['about_title'=>$about_title,
                'about_text'=>$about_text,
                'about_text_yd'=>$about_text_yd]
            );
        if($num == 1){
            echo "<script>alert('信息修改成功')</script>";
            return self::about_us();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::about_us_update($id);
        }
    }


    public function about_us_pic(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $pic = DB::table('about_anjila_pic')->get();
        return view('admin_about_anjila_pic',[
                'pic'=>$pic,
            ]);
    }

    public function about_us_pic_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('about_anjila_pic')->where('id',$id)->delete();
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

    public function about_us_pic_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_about_anjila_pic_insert');
    }

    public function about_us_pic_doInsert(){
        $about_pic = $_POST['about_pic'];
        if($about_pic == ''){
            echo "<script>alert('轮播图路径不能为空')</script>";
            return self::about_us_pic_insert();
        }
        $bool = DB::table('about_anjila_pic')->insert(
            ['about_pic'=>$about_pic]
            );
        if($bool){
            return redirect('/admin/about_us_pic');
        }else{
            return redirect()->back();
        }
    }

    public function about_us_pic_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $pic = DB::table('about_anjila_pic')->where('id',$id)->get();
        $data['pic'] = (array)$pic[0];
        return view('admin_about_anjila_pic_update',$data);
    }

    public function about_us_pic_doUpdate($id){
        $about_pic = $_POST['about_pic'];
        if($about_pic == ''){
            echo "<script>alert('关于我们轮播图路径不能为空')</script>";
            return self::about_us_pic_update($id);
        }
        $num = DB::table('about_anjila_pic')->where('id',$id)->update(
            ['about_pic'=>$about_pic]
            );
        if($num == 1){
            return redirect('/admin/about_us_pic');
        }else{
            return redirect()->back();
        }
    }

    public function development_text(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('development_history_text')->get();
        $data['info'] = $info;
        return view('admin_about_development_text',$data);
    }

    public function development_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $info = DB::table('development_history_text')->where(['id'=>$sid])->get();
        $data = [];
        $data['info'] = (array)$info[0];
        return view('admin_about_development_text_update',$data);
    }

    public function development_text_doUpdate($id){
        $history_text = $_POST['history_text'];
        $history_text_yd = $_POST['history_text_yd'];
        if($history_text == ''){
            echo "<script>alert('pc端发展历程文本不能为空')</script>";
            return self::development_text_update($id);
        }else if($history_text_yd == ''){
            echo "<script>alert('移动端发展历程文本不能为空')</script>";
            return self::development_text_update($id);
        }
        $num = DB::table('development_history_text')->where('id',$id)->update(
                ['history_text'=>$history_text,
                'history_text_yd'=>$history_text_yd]
            );
        if($num == 1){
            echo "<script>alert('文本修改成功')</script>";
            return self::development_text();
        }else{
            echo "<script>alert('发生未知错误,文本修改失败,请重新修改')</script>";
            return self::development_text_update($id);
        }
    }

    public function development_timer_shaft(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('development_timer_shaft')->get();
        $data['info'] = $info;
        return view('admin_about_development_timer_shaft',$data);
    }

    public function development_timer_shaft_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $info = DB::table('development_timer_shaft')->where(['id'=>$sid])->get();
        $data = [];
        $data['info'] = (array)$info[0];
        return view('admin_about_development_timer_shaft_update',$data);
    }

    public function development_timer_shaft_doUpdate($id){
        $timer_shaft_pic = $_POST['timer_shaft_pic'];
        $timer_shaft_year = $_POST['timer_shaft_year'];
        $kindergarten1 = $_POST['kindergarten1'];
        $kindergarten2 = $_POST['kindergarten2'];
        if($timer_shaft_pic == ''){
            echo "<script>alert('时间轴图片路径不能为空')</script>";
            return self::development_timer_shaft_update($id);
        }else if($timer_shaft_year == ''){
            echo "<script>alert('时间轴年份不能为空')</script>";
            return self::development_timer_shaft_update($id);
        }else if($kindergarten1 == ''){
            echo "<script>alert('园所1名称不能为空')</script>";
            return self::development_timer_shaft_update($id);
        }
        $num = DB::table('development_timer_shaft')->where('id',$id)->update(
                ['timer_shaft_pic'=>$timer_shaft_pic,
                'timer_shaft_year'=>$timer_shaft_year,
                'kindergarten1'=>$kindergarten1,
                'kindergarten2'=>$kindergarten2]
            );
        if($num == 1){
            echo "<script>alert('信息修改成功')</script>";
            return self::development_timer_shaft();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::development_timer_shaft_update($id);
        }
    }

    public function manage_team_text(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $info = DB::table('manage_team_text')->get();
        $data['info'] = $info;
        return view('admin_about_manage_team_text',$data);
    }

    public function manage_team_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $sid = $id;
        $info = DB::table('manage_team_text')->where(['id'=>$sid])->get();
        $data = [];
        $data['info'] = (array)$info[0];
        return view('admin_about_manage_team_text_update',$data);
    }

    public function manage_team_text_doUpdate($id){
        $manage_team_text = $_POST['manage_team_text'];
        $manage_team_text_yd = $_POST['manage_team_text_yd'];
        if($manage_team_text == ''){
            echo "<script>alert('pc端管理团队文本不能为空')</script>";
            return self::manage_team_text_update($id);
        }else if($manage_team_text_yd == ''){
            echo "<script>alert('移动端管理团队文本不能为空')</script>";
            return self::manage_team_text_update($id);           
        }
        $num = DB::table('manage_team_text')->where('id',$id)->update(
                ['manage_team_text'=>$manage_team_text,
                'manage_team_text_yd'=>$manage_team_text_yd]
            );
        if($num == 1){
            echo "<script>alert('文本修改成功')</script>";
            return self::manage_team_text();
        }else{
            echo "<script>alert('发生未知错误,文本修改失败,请重新修改')</script>";
            return self::manage_team_text_update($id);
        }
    }

    public function manage_team(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $team = DB::table('anjila_team')->orderBy('id','asc')->get();
        return view('admin_about_manage_team',[
                'team'=>$team
            ]);
    }

    public function manage_team_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_team')->where('id',$id)->delete();
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

    public function manage_team_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_about_manage_team_insert');
    }

    public function manage_team_doInsert(){
        $name = $_POST['name'];
        $position = $_POST['position'];
        $picture = $_POST['picture'];
        $introduction = $_POST['introduction'];
        if($name == ''){
            echo "<script>alert('管理人员姓名不能为空')</script>";
            return self::manage_team_insert();
        }else if($position == ''){
            echo "<script>alert('管理人员职位不能为空')</script>";
            return self::manage_team_insert();
        }else if($picture == ''){
            echo "<script>alert('管理人员照片路径不能为空')</script>";
            return self::manage_team_insert();
        }else if($introduction == ''){
            echo "<script>alert('管理人员简介不能为空')</script>";
            return self::manage_team_insert();
        }
        $bool = DB::table('anjila_team')->insert(
            ['name'=>$name,'position'=>$position,
            'picture'=>$picture,'introduction'=>$introduction]
            );
        if($bool){
                return redirect('/admin/manage_team');
            }else{
                return redirect()->back();
            }
    }

    public function manage_team_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $team = DB::table('anjila_team')->where('id',$id)->get();
        $data['team'] = (array)$team[0];
        return view('admin_about_manage_team_update',$data);
    }

    public function manage_team_doUpdate($id){
        $name = $_POST['name'];
        $position = $_POST['position'];
        $picture = $_POST['picture'];
        $introduction = $_POST['introduction'];
        if($name == ''){
            echo "<script>alert('成员姓名不能为空')</script>";
            return self::manage_team_update($id);
        }else if($position == ''){
                echo "<script>alert('成员职位不能为空')</script>";
                return self::manage_team_update($id);
        }else if($picture == ''){
                echo "<script>alert('成员照片路径不能为空')</script>";
                return self::manage_team_update($id);
        }else if($introduction == ''){
                echo "<script>alert('成员简介不能为空')</script>";
                return self::manage_team_update($id);
        }
        $num = DB::table('anjila_team')->where('id',$id)->update(
            ['name'=>$name,'position'=>$position,
            'picture'=>$picture,'introduction'=>$introduction]
            );
        if($num == 1){
            return redirect('/admin/manage_team');
        }else{
            return redirect()->back();
        }
    }

    public function kindergarten(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $kinder = DB::table('kindergarten_index')->orderBy('id','asc')->get();
        return view('admin_about_kindergarten',[
                'kinder'=>$kinder
            ]);
    }

    public function kindergarten_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('kindergarten_index')->where('id',$id)->delete();
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

    public function kindergarten_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_about_kindergarten_insert');
    }

    public function kindergarten_doInsert(){
        $kinder_cover = $_POST['kinder_cover'];
        $kinder_name = $_POST['kinder_name'];
        $kinder_address = $_POST['kinder_address'];
        $kinder_tel1 = $_POST['kinder_tel1'];
        $kinder_tel2 = $_POST['kinder_tel2'];
        $is_first = $_POST['is_first'];
        $first_picture = $_POST['first_picture'];
        if($kinder_cover == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::kindergarten_insert();
        }else if($kinder_name == ''){
            echo "<script>alert('园所名称不能为空')</script>";
            return self::kindergarten_insert();
        }else if($kinder_address == ''){
            echo "<script>alert('园所地址不能为空')</script>";
            return self::kindergarten_insert();
        }else if($kinder_tel1 == ''){
            echo "<script>alert('园所电话1不能为空')</script>";
            return self::kindergarten_insert();
        }else if($is_first == '1'){
            if($first_picture == ''){
                echo "<script>alert('首推封面图路径不能为空')</script>";
                return self::kindergarten_insert();
            }
        }
        $bool = DB::table('kindergarten_index')->insert(
            ['kinder_cover'=>$kinder_cover,'kinder_name'=>$kinder_name,
            'kinder_address'=>$kinder_address,'kinder_tel1'=>$kinder_tel1,
            'kinder_tel2'=>$kinder_tel2,'is_first'=>$is_first,
            'first_picture'=>$first_picture]
            );
        if($bool){
                return redirect('/admin/kindergarten');
            }else{
                return redirect()->back();
            }
    }

    public function kindergarten_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $kinder = DB::table('kindergarten_index')->where('id',$id)->get();
        $data['kinder'] = (array)$kinder[0];
        return view('admin_about_kindergarten_update',$data);
    }

    public function kindergarten_doUpdate($id){
        $kinder_cover = $_POST['kinder_cover'];
        $kinder_name = $_POST['kinder_name'];
        $kinder_address = $_POST['kinder_address'];
        $kinder_tel1 = $_POST['kinder_tel1'];
        $kinder_tel2 = $_POST['kinder_tel2'];
        $is_first = $_POST['is_first'];
        $first_picture = $_POST['first_picture'];
        if($kinder_cover == ''){
            echo "<script>alert('封面图路径不能为空')</script>";
            return self::kindergarten_update($id);
        }else if($kinder_name == ''){
            echo "<script>alert('园所名称不能为空')</script>";
            return self::kindergarten_update($id);
        }else if($kinder_address == ''){
            echo "<script>alert('园所地址不能为空')</script>";
            return self::kindergarten_update($id);
        }else if($kinder_tel1 == ''){
            echo "<script>alert('园所电话1不能为空')</script>";
            return self::kindergarten_update($id);
        }else if($is_first == '1'){
            if($first_picture == ''){
                echo "<script>alert('首推封面图路径不能为空')</script>";
                return self::kindergarten_update($id);
            }
        }
        $num = DB::table('kindergarten_index')->where('id',$id)->update(
            ['kinder_cover'=>$kinder_cover,'kinder_name'=>$kinder_name,
            'kinder_address'=>$kinder_address,'kinder_tel1'=>$kinder_tel1,
            'kinder_tel2'=>$kinder_tel2,'is_first'=>$is_first,
            'first_picture'=>$first_picture]
            );
        if($num == 1){
            return redirect('/admin/kindergarten');
        }else{
            return redirect()->back();
        }
    }

    public function kindergarten_label_index($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        //园所id
        $cid = $id;
        $data['cid'] = $cid;
        //园所名称
        $kinder_name = DB::table('kindergarten_index')->where('id',$id)->pluck('kinder_name');
        $data['kinder_name'] = $kinder_name;
        //标签
        $label = DB::table('kindergarten_label')->where('kinder_id',$id)->get();
        $data['label'] = $label;
        return view('admin_about_kindergarten_label',$data);
    }

    public function kindergarten_label_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('kindergarten_label')->where('id',$id)->delete();
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

    public function kindergarten_label_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['kinder_id'] = $id;
        return view('admin_about_kindergarten_label_insert',$data);
    }

    public function kindergarten_label_doInsert(){
        $label_name = $_POST['label_name'];
        $kinder_id = $_POST['kinder_id'];
        $num = DB::table('kindergarten_index')->where('id',$kinder_id)->get();
        if($num){
            $bool = DB::table('kindergarten_label')->insert(
                ['label_name'=>$label_name,'kinder_id'=>$kinder_id]
                );
            if($bool){
                    return redirect('/admin/kindergarten/label/'.$kinder_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('园所id不存在')</script>";
            return self::kindergarten_label_insert($kinder_id);            
        }
    }

    public function kindergarten_label_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $label = DB::table('kindergarten_label')->where('id',$id)->get();
        $data['label'] = (array)$label[0];
        return view('admin_about_kindergarten_label_update',$data);
    }

    public function kindergarten_label_doUpdate($id){
        $label_name = $_POST['label_name'];
        $mid = $_POST['mid'];
        if($label_name == ''){
            echo "<script>alert('园所详情标签不能为空')</script>";
            return self::kindergarten_label_update($id);
        }
        $num = DB::table('kindergarten_label')->where('id',$id)->update(
            ['label_name'=>$label_name]
            );
        if($num == 1){
            return redirect('/admin/kindergarten/label/'.$mid);
        }else{
            return redirect()->back();
        }
    }

    public function kindergarten_label_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('kindergarten_label_index')
                    ->orderBy('id','asc')->where('label_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_about_kindergarten_label_details',$data);
    }

    public function kindergarten_label_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('kindergarten_label_index')->where('id',$id)->delete();
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

    public function kindergarten_label_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_about_kindergarten_label_details_pic_insert',$data);
    }

    public function kindergarten_label_details_pic_doInsert(){
        $label_pic = $_POST['label_pic'];
        $label_id = $_POST['label_id'];
        $num = DB::table('kindergarten_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('kindergarten_label_index')->insert(
                ['label_pic'=>$label_pic,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/kindergarten/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::kindergarten_label_details_pic_insert($label_id);            
        }
    }

    public function kindergarten_label_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['label_id'] = $id;
        return view('admin_about_kindergarten_label_details_text_insert',$data);
    }

    public function kindergarten_label_details_text_doInsert(){
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('kindergarten_label')->where('id',$label_id)->get();
        if($num){
            $bool = DB::table('kindergarten_label_index')->insert(
                ['label_text'=>$label_text,'label_id'=>$label_id]
                );
            if($bool){
                    return redirect('/admin/kindergarten/label/details/'.$label_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属标签id不存在')</script>";
            return self::kindergarten_label_details_text_insert($label_id);            
        }
    }

    public function kindergarten_label_details_text_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('kindergarten_label_index')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_about_kindergarten_label_details_update',$data);
    }

    public function kindergarten_label_details_text_doUpdate($id){
        $label_pic = $_POST['label_pic'];
        $label_text = $_POST['label_text'];
        $label_id = $_POST['label_id'];
        $num = DB::table('kindergarten_label_index')->where('id',$id)->update(
            ['label_pic'=>$label_pic,'label_text'=>$label_text]
            );
        if($num == 1){
            return redirect('/admin/kindergarten/label/details/'.$label_id);
        }else{
            return redirect()->back();
        }
    }


}