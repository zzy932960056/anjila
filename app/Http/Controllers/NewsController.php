<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\News;
class NewsController extends Controller
{   
    public function news_social(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $news = News::where('sort','社会活动')->orderBy('id','asc')->paginate(5);
        return view('admin_news_social',[
                'news'=>$news,
            ]);
    }

    public function news_social_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news')->where('id',$id)->delete();
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

    public function news_social_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_news_social_insert');
    }

    public function news_social_doInsert(){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_social_insert();
        }else if($cover_pic == ''){
            echo "<script>alert('动态封面图路径不能为空')</script>";
            return self::news_social_insert();
        }else if($date_time == ''){
            echo "<script>alert('动态时间不能为空')</script>";
            return self::news_social_insert();
        }
        $bool = DB::table('anjila_news')->insert(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>'社会活动','a_link'=>'/news_sh']
            );
        if($bool){
            return redirect('/admin/news_social');
        }else{
            return redirect()->back();
        }
    }

    public function news_social_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $news = DB::table('anjila_news')->where('id',$id)->get();
        $data['news'] = (array)$news[0];
        return view('admin_news_social_update',$data);
    }

    public function news_social_doUpdate($id){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        $sort = $_POST['sort'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_social_update($id);
        }else if($cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::news_social_update($id);
        }else if($date_time == ''){
                echo "<script>alert('动态时间不能为空')</script>";
                return self::news_social_update($id);
        }
        $num = DB::table('anjila_news')->where('id',$id)->update(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>$sort]
            );
        if($num == 1){
            return redirect('/admin/news_social');
        }else{
            return redirect()->back();
        }
    }

    public function news_social_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')
                    ->orderBy('id','asc')->where('news_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_news_social_details',$data);
    }

    public function news_social_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news_details')->where('id',$id)->delete();
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

    public function news_social_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_social_details_pic_insert',$data);
    }

    public function news_social_details_pic_doInsert(){
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_pic'=>$news_pic,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_social/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_social_details_pic_insert($news_id);            
        }
    }

    public function news_social_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_social_details_text_insert',$data);
    }

    public function news_social_details_text_doInsert(){
        $news_text = $_POST['news_text'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_text'=>$news_text,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_social/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_social_details_pic_insert($news_id);            
        }
    }

    public function news_social_details_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_news_social_details_update',$data);
    }

    public function news_social_details_doUpdate($id){
        $news_text = $_POST['news_text'];
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$id)->update(
            ['news_text'=>$news_text,'news_pic'=>$news_pic]
            );
        if($num == 1){
            return redirect('/admin/news_social/details/'.$news_id);
        }else{
            return redirect()->back();
        }
    }

    public function news_festival(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $news = News::where('sort','节日活动')->orderBy('id','asc')->paginate(5);
        return view('admin_news_festival',[
                'news'=>$news,
            ]);
    }

    public function news_festival_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news')->where('id',$id)->delete();
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

    public function news_festival_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_news_festival_insert');
    }

    public function news_festival_doInsert(){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_festival_insert();
        }else if($cover_pic == ''){
            echo "<script>alert('动态封面图路径不能为空')</script>";
            return self::news_festival_insert();
        }else if($date_time == ''){
            echo "<script>alert('动态时间不能为空')</script>";
            return self::news_festival_insert();
        }
        $bool = DB::table('anjila_news')->insert(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>'节日活动','a_link'=>'/news_jr']
            );
        if($bool){
            return redirect('/admin/news_festival');
        }else{
            return redirect()->back();
        }
    }

    public function news_festival_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $news = DB::table('anjila_news')->where('id',$id)->get();
        $data['news'] = (array)$news[0];
        return view('admin_news_festival_update',$data);
    }

    public function news_festival_doUpdate($id){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        $sort = $_POST['sort'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_festival_update($id);
        }else if($cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::news_festival_update($id);
        }else if($date_time == ''){
                echo "<script>alert('动态时间不能为空')</script>";
                return self::news_festival_update($id);
        }
        $num = DB::table('anjila_news')->where('id',$id)->update(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>$sort]
            );
        if($num == 1){
            return redirect('/admin/news_festival');
        }else{
            return redirect()->back();
        }
    }

    public function news_festival_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')
                    ->orderBy('id','asc')->where('news_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_news_festival_details',$data);
    }

    public function news_festival_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news_details')->where('id',$id)->delete();
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

    public function news_festival_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_festival_details_pic_insert',$data);
    }

    public function news_festival_details_pic_doInsert(){
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_pic'=>$news_pic,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_festival/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_festival_details_pic_insert($news_id);            
        }
    }

    public function news_festival_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_festival_details_text_insert',$data);
    }

    public function news_festival_details_text_doInsert(){
        $news_text = $_POST['news_text'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_text'=>$news_text,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_festival/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_festival_details_pic_insert($news_id);            
        }
    }

    public function news_festival_details_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_news_festival_details_update',$data);
    }

    public function news_festival_details_doUpdate($id){
        $news_text = $_POST['news_text'];
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$id)->update(
            ['news_text'=>$news_text,'news_pic'=>$news_pic]
            );
        if($num == 1){
            return redirect('/admin/news_festival/details/'.$news_id);
        }else{
            return redirect()->back();
        }
    }

    public function news_class(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $news = News::where('sort','班级活动')->orderBy('id','asc')->paginate(5);
        return view('admin_news_class',[
                'news'=>$news,
            ]);
    }

    public function news_class_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news')->where('id',$id)->delete();
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

    public function news_class_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_news_class_insert');
    }

    public function news_class_doInsert(){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_class_insert();
        }else if($cover_pic == ''){
            echo "<script>alert('动态封面图路径不能为空')</script>";
            return self::news_class_insert();
        }else if($date_time == ''){
            echo "<script>alert('动态时间不能为空')</script>";
            return self::news_class_insert();
        }
        $bool = DB::table('anjila_news')->insert(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>'班级活动','a_link'=>'/news_bj']
            );
        if($bool){
            return redirect('/admin/news_class');
        }else{
            return redirect()->back();
        }
    }

    public function news_class_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $news = DB::table('anjila_news')->where('id',$id)->get();
        $data['news'] = (array)$news[0];
        return view('admin_news_class_update',$data);
    }

    public function news_class_doUpdate($id){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        $sort = $_POST['sort'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_class_update($id);
        }else if($cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::news_class_update($id);
        }else if($date_time == ''){
                echo "<script>alert('动态时间不能为空')</script>";
                return self::news_class_update($id);
        }
        $num = DB::table('anjila_news')->where('id',$id)->update(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>$sort]
            );
        if($num == 1){
            return redirect('/admin/news_class');
        }else{
            return redirect()->back();
        }
    }

    public function news_class_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')
                    ->orderBy('id','asc')->where('news_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_news_class_details',$data);
    }

    public function news_class_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news_details')->where('id',$id)->delete();
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

    public function news_class_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_class_details_pic_insert',$data);
    }

    public function news_class_details_pic_doInsert(){
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_pic'=>$news_pic,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_class/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_class_details_pic_insert($news_id);            
        }
    }

    public function news_class_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_class_details_text_insert',$data);
    }

    public function news_class_details_text_doInsert(){
        $news_text = $_POST['news_text'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_text'=>$news_text,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_class/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_class_details_pic_insert($news_id);            
        }
    }

    public function news_class_details_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_news_class_details_update',$data);
    }

    public function news_class_details_doUpdate($id){
        $news_text = $_POST['news_text'];
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$id)->update(
            ['news_text'=>$news_text,'news_pic'=>$news_pic]
            );
        if($num == 1){
            return redirect('/admin/news_class/details/'.$news_id);
        }else{
            return redirect()->back();
        }
    }

    public function news_parents(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $news = News::where('sort','父母沙龙')->orderBy('id','asc')->paginate(5);
        return view('admin_news_parents',[
                'news'=>$news,
            ]);
    }

    public function news_parents_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news')->where('id',$id)->delete();
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

    public function news_parents_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_news_parents_insert');
    }

    public function news_parents_doInsert(){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_parents_insert();
        }else if($cover_pic == ''){
            echo "<script>alert('动态封面图路径不能为空')</script>";
            return self::news_parents_insert();
        }else if($date_time == ''){
            echo "<script>alert('动态时间不能为空')</script>";
            return self::news_parents_insert();
        }
        $bool = DB::table('anjila_news')->insert(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>'父母沙龙','a_link'=>'/news_fm']
            );
        if($bool){
            return redirect('/admin/news_parents');
        }else{
            return redirect()->back();
        }
    }

    public function news_parents_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $news = DB::table('anjila_news')->where('id',$id)->get();
        $data['news'] = (array)$news[0];
        return view('admin_news_parents_update',$data);
    }

    public function news_parents_doUpdate($id){
        $title_c = $_POST['title_c'];
        $title_e = $_POST['title_e'];
        $cover_pic = $_POST['cover_pic'];
        $date_time = $_POST['date_time'];
        $sort = $_POST['sort'];
        if($title_c == ''){
            echo "<script>alert('动态中文名称不能为空')</script>";
            return self::news_parents_update($id);
        }else if($cover_pic == ''){
                echo "<script>alert('封面图路径不能为空')</script>";
                return self::news_parents_update($id);
        }else if($date_time == ''){
                echo "<script>alert('动态时间不能为空')</script>";
                return self::news_parents_update($id);
        }
        $num = DB::table('anjila_news')->where('id',$id)->update(
            ['title_c'=>$title_c,'title_e'=>$title_e,
            'cover_pic'=>$cover_pic,'date_time'=>$date_time,
            'sort'=>$sort]
            );
        if($num == 1){
            return redirect('/admin/news_parents');
        }else{
            return redirect()->back();
        }
    }

    public function news_parents_details($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')
                    ->orderBy('id','asc')->where('news_id',$wid)->get();
        $data['details'] = (array)$details;
        $data['nid'] = $wid;
        return view('admin_news_parents_details',$data);
    }

    public function news_parents_details_doDelete(){
        $id = $_POST['mid'];
        $num = DB::table('anjila_news_details')->where('id',$id)->delete();
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

    public function news_parents_details_pic_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_parents_details_pic_insert',$data);
    }

    public function news_parents_details_pic_doInsert(){
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_pic'=>$news_pic,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_parents/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_parents_details_pic_insert($news_id);            
        }
    }

    public function news_parents_details_text_insert($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $data['news_id'] = $id;
        return view('admin_news_parents_details_text_insert',$data);
    }

    public function news_parents_details_text_doInsert(){
        $news_text = $_POST['news_text'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$news_id)->get();
        if($num){
            $bool = DB::table('anjila_news_details')->insert(
                ['news_text'=>$news_text,'news_id'=>$news_id]
                );
            if($bool){
                    return redirect('/admin/news_parents/details/'.$news_id);
                }else{
                    return redirect()->back();
                }
        }else{
            echo "<script>alert('发生未知错误,所属动态id不存在')</script>";
            return self::news_parents_details_pic_insert($news_id);            
        }
    }

    public function news_parents_details_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $wid = $id;
        $data = [];
        $details = DB::table('anjila_news_details')->where('id',$wid)->get();
        $data['details'] = (array)$details[0];
        return view('admin_news_parents_details_update',$data);
    }

    public function news_parents_details_doUpdate($id){
        $news_text = $_POST['news_text'];
        $news_pic = $_POST['news_pic'];
        $news_id = $_POST['news_id'];
        $num = DB::table('anjila_news_details')->where('id',$id)->update(
            ['news_text'=>$news_text,'news_pic'=>$news_pic]
            );
        if($num == 1){
            return redirect('/admin/news_parents/details/'.$news_id);
        }else{
            return redirect()->back();
        }
    }

}