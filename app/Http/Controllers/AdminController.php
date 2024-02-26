<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{   
    //登录
    public function login(){
    	return view('login');
    }

    //登出
    public function logout(){
        session_start();
        session_destroy();
        return view('login');
    }

    //登录验证
    public function doLogin(){
    	$user_name = $_POST['username'];
    	$user_pwd = $_POST['password'];
        $user_pwd = md5($user_pwd);
        $admin = DB::table('admin_users')->where(['username'=>$user_name ,'password'=>$user_pwd])->get();
        if($admin){
            @session_start();
            $_SESSION['admin_name'] = $user_name;
            return redirect('/admin/adminindex');
        }else{
            echo "<script>alert('请输入正确账号或密码')</script>";
            return self::login();
        }
    }

    //管理后台主页
    public function adminIndex(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $admin = DB::table('admin_users')->orderBy('id','asc')->get();
        $data['admin'] = $admin;
        return view('index',$data);
    }

    //后台上锁
    public function adminLock(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('extra_lock');
    }

    //锁屏登录
    public function lockLogin(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $admin_name = $_SESSION['admin_name'];
        $admin_pwd = $_POST['apwd'];
        $admin_pwd = md5($admin_pwd);
        $admin = DB::table('admin_users')->where(['username'=>$admin_name ,'password'=>$admin_pwd])->get();
        if(empty($admin)){
            echo "<script>alert('请输入正确密码')</script>";
            return self::adminLock();
        }else if($admin){
            return self::adminIndex();
        }
    }

    //修改资料
    public function update(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $admin_name = $_SESSION['admin_name'];
        $admin = DB::table('admin_users')->where(['username'=>$admin_name])->get();
        $data = [];
        $data['admin'] = $admin;
        return view('admin_self_update',$data);
    }

    //do修改资料
    public function doUpdate(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $admin_name = $_SESSION['admin_name'];
        $aname = $_POST['aname'];
        $apwd = $_POST['apwd'];
        $reapwd = $_POST['reapwd'];
        if($aname == ''){
            echo "<script>alert('用户名不能为空')</script>";
            return self::update();
        }else if($apwd == '' || $reapwd == ''){
            echo "<script>alert('密码不能为空')</script>";
            return self::update();
        }else if($apwd != $reapwd){
            echo "<script>alert('两次密码输入不一致')</script>";
            return self::update();
        }
        $admin = DB::table('admin_users')->where(['username'=>$admin_name])->get();
        $apwd =md5($apwd);
        if($apwd == $admin[0]->password){
            echo "<script>alert('与原密码一致,无需修改')</script>";
            return self::update();
        }
        $num = DB::table('admin_users')->where('username',$admin_name)->update(
                ['username'=>$aname,
                 'password'=>$apwd]
            );
        if($num == 1){
            echo "<script>alert('基本信息修改成功,请重新登陆')</script>";
            return self::login();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::update();
        }
    }

    //管理员展示
    public function admin(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $admin = DB::table('admin_users')->orderBy('id','asc')->get();
        $data['admin'] = $admin;
        return view('admin',$data);
    }

    //管理员删除
    public function admin_doDelete(){
        $id = $_POST['cid'];
        $num = DB::table('admin_users')->where('id',$id)->delete();
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

    //管理员新增
    public function admin_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $role = DB::table('admin_role')->select('role_id','role_sign','role_name','update_time')->orderBy('role_id','asc')->get();
        $data['role'] = $role;
        return view('admin_insert',$data);
    }

    //do管理员新增
    public function admin_doInsert(){
        $aname = $_POST['aname'];
        $apwd = $_POST['apwd'];
        $reapwd = $_POST['reapwd'];
        $arole = $_POST['arole'];
        if($aname == ''){
            echo "<script>alert('用户名不能为空')</script>";
            return self::admin_insert();
        }else if($apwd == '' || $reapwd == ''){
            echo "<script>alert('密码不能为空')</script>";
            return self::admin_insert();
        }else if($apwd != $reapwd){
            echo "<script>alert('两次密码输入不一致')</script>";
            return self::admin_insert();
        }
        $apwd = md5($apwd);
        $bool = DB::table('admin_users')->insert(
            ['username'=>$aname,'password'=>$apwd,'role_id'=>$arole]
            );
        if($bool){
            echo "<script>alert('新增成功')</script>";
            return self::admin();
        }else{
            echo "<script>alert('新增失败')</script>";
            return self::admin();
        }
    }

    //管理员编辑
    public function admin_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $aid = $id;
        $data = [];
        $admin = DB::table('admin_users')->where('id',$aid)->get();
        $data['admin'] = (array)$admin[0];
        $role_id = $data['admin']['role_id'];
        $role = DB::table('admin_role')->select('role_name')->where('role_id',$role_id)->get();
        $role_name = $role[0]->role_name;
        $data['role_name'] = $role_name;
        $role = DB::table('admin_role')->select('role_id','role_sign','role_name','update_time')->orderBy('role_id','asc')->get();
        $data['role'] = $role;
        return view('admin_update',$data);

    }

    //do管理员编辑
    public function admin_doUpdate($id){
        $aname = $_POST['uname'];
        $apwd = $_POST["apwd"];
        $reapwd = $_POST["reapwd"];
        $arole = $_POST["arole"];
        if($arole == '超级管理员'){
            $arole = 1;
        }
        if($aname == ''){
            echo "<script>alert('用户名不能为空')</script>";
            return self::admin_update($id);
        }else if($apwd == '' || $reapwd == ''){
            echo "<script>alert('密码不能为空')</script>";
            return self::admin_update($id);
        }else if($apwd != $reapwd){
            echo "<script>alert('两次密码输入不一致')</script>";
            return self::admin_update($id);
        }
        $admin = DB::table('admin_users')->where(['id'=>$id])->get();
        $apwd =md5($apwd);
        if($apwd == $admin[0]->password){
            echo "<script>alert('与原密码一致,无需修改')</script>";
            return self::admin_update($id);
        }
        $num = DB::table('admin_users')->where('id',$id)->update(
                ['username'=>$aname,
                 'password'=>$apwd,
                 'role_id'=>$arole]
            );
        if($num == 1){
            echo "<script>alert('该管理员基本信息修改成功')</script>";
            return self::admin();
        }else{
            echo "<script>alert('发生未知错误,信息修改失败,请重新修改')</script>";
            return self::admin_update($id);
        }
    }

    //管理员角色展示
    public function admin_role(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $role = DB::table('admin_role')->select('role_id','role_sign','role_name','update_time')->orderBy('role_id','asc')->get();
        $data['role'] = $role;
        return view('admin_role',$data);
    }

    //管理员角色新增
    public function admin_role_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_role_insert');
    }
    
    //do管理员角色新增
    public function do_admin_role_insert(){
        $role_sign = $_POST['sign'];
        $role_name = $_POST['sname'];
        $time = date('Y-m-d H:i:s',time());
        $bool = DB::table('admin_role')->insert(
            ['role_sign'=>$role_sign,'role_name'=>$role_name,'create_time'=>$time,'update_time'=>$time]
            );
        if($bool){
            echo "<script>alert('新增成功')</script>";
            return self::admin_role();
        }else{
            echo "<script>alert('新增失败')</script>";
            return self::admin_role();
        }
    }

    //管理员角色删除
    public function admin_role_doDelete(){
        $cid = $_POST['cid'];
        $num = DB::table('admin_role')->where('role_id',$cid)->delete();
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

    //管理员角色编辑
    public function admin_role_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $cid = $id;
        $role = DB::table('admin_role')->where('role_id',$cid)->get();
        $data['role'] = (array)$role[0];
        return view('admin_role_update',$data);
    }

    //do管理员角色编辑
    public function admin_role_doUpdate($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $cid = $id;
        $role_sign = $_POST['role_sign'];
        $role_name = $_POST['role_name'];
        $num = DB::table('admin_role')->where('role_id',$cid)->update(
                ['role_sign'=>$role_sign,
                 'role_name'=>$role_name]
            );
        if($num == 1){
            echo "<script>alert('角色信息修改成功')</script>";
            return self::admin_role();
        }else{
            echo "<script>alert('角色信息修改失败')</script>";
            return self::admin_role();
        }
    }

    //权限展示
    public function admin_power(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $power = DB::table('admin_power')->orderBy('power_id','asc')->get();
        $data['power'] = $power;
        return view('admin_power',$data);
    }

    //权限新增
    public function admin_power_insert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_power_insert');
    }

    //do权限新增
    public function admin_power_doInsert(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $power_sign = $_POST['sign'];
        $power_name = $_POST['sname'];
        $time = date('Y-m-d H:i:s',time());
        $bool = DB::table('admin_power')->insert(
            ['power_sign'=>$power_sign,'power_name'=>$power_name,'create_time'=>$time,'update_time'=>$time]
            );
        if($bool){
            echo "<script>alert('新增成功')</script>";
            return self::admin_power();
        }else{
            echo "<script>alert('新增失败')</script>";
            return self::admin_power();
        }
    }

    //权限删除
    public function admin_power_doDelete(){
        $cid = $_POST['cid'];
        $num = DB::table('admin_power')->where('power_id',$cid)->delete();
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

    //权限编辑
    public function admin_power_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $cid = $id;
        $power = DB::table('admin_power')->where('power_id',$cid)->get();
        $data['power'] = (array)$power[0];
        return view('admin_power_update',$data);
    }

    //do权限编辑
    public function admin_power_doUpdate($id){
        $pid = $id;
        $power_sign = $_POST['power_sign'];
        $power_name = $_POST['power_name'];
        $num = DB::table('admin_power')->where('power_id',$pid)->update(
                ['power_sign'=>$power_sign,
                 'power_name'=>$power_name]
            );
        if($num == 1){
            echo "<script>alert('角色信息修改成功')</script>";
            return self::admin_power();
        }else{
            echo "<script>alert('角色信息修改失败')</script>";
            return self::admin_power();
        }
    }

    //七牛云文件上传
    public function admin_upload(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $storage = \Storage::disk(config('admin.upload.disk'));
        $uploadToken = $storage->uploadToken();
        $data['uptoken'] = $uploadToken;
        return view('upload', $data);
    }

    //CDN图片管理
    public function cdn_image(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $image = DB::table('cdn_image')->orderBy('id','asc')->get();
        $data['image'] = $image;
        return view('cdn_image',$data);
    }

    //CDN图片新增上传
    public function admin_pic_upload(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_pic_upload');
    }

    //doCDN图片新增上传
    public function admin_pic_doInsert(Request $request){
        if($request->isMethod('post')){
            $file = $request->file('goods_file');
            //判断文件是否上传成功
            if($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType(); 
                //临时文件绝对路径
                $realPath = $file->getRealPath();
                //文件名(最终)
                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                //上传
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                //上传成功
                if($bool){
                    //获取图片描述
                    $describe = $_POST['describe']; 
                    //创建时间
                    $time = date('Y-m-d H:i:s');
                    //文件路径
                    $file_path = '/uploads/'.$filename;
                    //数据库操作
                    $bo = DB::table('cdn_image')->insert(
                        ['image_name'=>$filename,'path'=>$file_path,'description'=>$describe,'create_time'=>$time]
                        );
                    if($bo){
                        echo "<script>alert('文件上传成功')</script>";
                    }else{
                        echo "<script>alert('文件上传失败')</script>";
                    }
                    return self::cdn_image();
                }
            }
        }
    }

    //doCDN图片删除
    public function admin_cdnimage_doDelete(){
        $id = $_POST['cid'];
        //根据ID查询文件名
        $ima = DB::table('cdn_image')->select('path')->where('id',$id)->get();
        //路径
        $im = $ima[0]->path;
        //完整路径
        $imm = url($im);
        //删除文件
        //Storage::delete($im);
        //删除文件数据库
        $num = DB::table('cdn_image')->where('id',$id)->delete();
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

    //CDN图片编辑
    public function admin_image_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $pic_id = $id;
        $picture = DB::table('cdn_image')->where('id',$pic_id)->get();
        $data['picture'] = (array)$picture[0];
        return view('admin_pic_upload_update',$data);
    }

    //doCDN图片编辑
    public function admin_image_doUpdate(Request $request){
        //未更改图片
        if($_FILES['goods_file']['name'] == ''){
            $description = $_POST['describe'];
            $id = $_POST['pic_hidden'];
            $num = DB::table('cdn_image')->where('id',$id)->update(
                ['description'=>$description]
            );
            if($num == 1){
                echo "<script>alert('图片信息修改成功')</script>";
                return self::cdn_image();
            }else{
                echo "<script>alert('图片信息修改失败')</script>";
                return self::cdn_image();
            }
        //更新了图片    
        }else{
            if($request->isMethod('post')){
                $file = $request->file('goods_file');
                //判断文件是否上传成功
                if($file->isValid()){
                    //原文件名
                    $originalName = $file->getClientOriginalName();
                    //扩展名
                    $ext = $file->getClientOriginalExtension();
                    //MimeType
                    $type = $file->getClientMimeType(); 
                    //临时文件绝对路径
                    $realPath = $file->getRealPath();
                    //文件名(最终)
                    $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                    //上传
                    $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                    //上传成功
                    if($bool){
                        //获取图片描述
                        $describe = $_POST['describe'];
                        //获取图片ID
                        $id = $_POST['pic_hidden'];
                        //创建时间
                        $time = date('Y-m-d H:i:s');
                        //文件路径
                        $file_path = '/uploads/'.$filename;
                        //数据库操作
                        $num = DB::table('cdn_image')->where('id',$id)->update(
                            ['description'=>$describe,'create_time'=>$time,'path'=>$file_path,'image_name'=>$filename]
                        );
                        if($num == 1){
                            echo "<script>alert('图片信息修改成功')</script>";
                            return self::cdn_image();
                        }else{
                            echo "<script>alert('图片信息修改失败')</script>";
                            return self::cdn_image();
                        }
                    }
                }
            }
        }
    }

    //CDN视频管理
    public function cdn_video(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $data = [];
        $video = DB::table('cdn_video')->orderBy('video_type','asc')->get();
        $data['video'] = $video;
        return view('cdn_video',$data);
    }

    //CDN视频新增上传
    public function admin_video_upload(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_video_upload');
    }

    //doCDN视频新增上传
    public function admin_video_doInsert(Request $request){
        if($request->isMethod('post')){
            $file = $request->file('goods_file');
            //判断文件是否上传成功
            if($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType(); 
                //临时文件绝对路径
                $realPath = $file->getRealPath();
                //文件名(最终)
                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                //上传
                $bool = Storage::disk('video_uploads')->put($filename,file_get_contents($realPath));
                //上传成功
                if($bool){
                    //图片描述
                    $describe = $_POST['describe'];
                    //视频类型
                    $video_type = $_POST['video_type'];
                    //视频链接
                    $link = $_POST['link'];
                    //创建时间
                    $time = date('Y-m-d H:i:s');
                    //文件路径
                    $file_path = '/video_uploads/'.$filename;
                    //数据库操作
                    $bo = DB::table('cdn_video')->insert(
                        ['description'=>$describe,'video_type'=>$video_type,'image_path'=>$file_path,'video_path'=>$link,'create_time'=>$time]
                        );
                    if($bo){
                        echo "<script>alert('视频文件配置成功')</script>";
                    }else{
                        echo "<script>alert('视频文件配置失败')</script>";
                    }
                    return self::cdn_video();
                }
            }
        }
    }

    //doCDN视频删除
    public function admin_cdnvideo_doDelete(){
        $id = $_POST['cid'];
        //根据ID查询文件名
        $ima = DB::table('cdn_video')->select('image_path')->where('id',$id)->get();
        //路径
        $im = $ima[0]->image_path;
        //完整路径
        $imm = url($im);
        //删除文件
        //Storage::delete($im);
        //删除文件数据库
        $num = DB::table('cdn_video')->where('id',$id)->delete();
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

    //CDN视频编辑
    public function admin_video_update($id){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        $video_id = $id;
        $video = DB::table('cdn_video')->where('id',$video_id)->get();
        $data['video'] = (array)$video[0];
        //类型编号
        $video_tyno = $video[0]->video_type;
        $types = DB::table('video_type')->where('type_id',$video_tyno)->get();
        //类型名称
        $video_tyna = $types[0]->type_name;
        $data['type'] = ['type_id'=>$video_tyno,'type_name'=>$video_tyna];
        $type_name = DB::table('video_type')->select('id','type_name','type_id')->orderBy('type_id','asc')->get();
        $data['type_name'] = $type_name;
        return view('admin_video_upload_update',$data);
    }

    //doCDN视频编辑
    public function admin_video_doUpdate(Request $request){
        //未更改视频封面图
        if($_FILES['goods_file']['name'] == ''){
            //描述
            $description = $_POST['describe'];
            //id 
            $id = $_POST['video_hidden'];
            //视频类型
            $video_type = $_POST['video_type'];
            //视频路径
            $video_path = $_POST['video_path'];
            $num = DB::table('cdn_video')->where('id',$id)->update(
                ['description'=>$description,'video_type'=>$video_type,'video_path'=>$video_path]
            );
            if($num == 1){
                echo "<script>alert('视频信息修改成功')</script>";
                return self::cdn_video();
            }else{
                echo "<script>alert('视频信息修改失败')</script>";
                return self::cdn_video();
            }
        //更新了视频封面图    
        }else{
            if($request->isMethod('post')){
                $file = $request->file('goods_file');
                //判断文件是否上传成功
                if($file->isValid()){
                    //原文件名
                    $originalName = $file->getClientOriginalName();
                    //扩展名
                    $ext = $file->getClientOriginalExtension();
                    //MimeType
                    $type = $file->getClientMimeType(); 
                    //临时文件绝对路径
                    $realPath = $file->getRealPath();
                    //文件名(最终)
                    $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                    //上传
                    $bool = Storage::disk('video_uploads')->put($filename,file_get_contents($realPath));
                    //上传成功
                    if($bool){
                        //获取图片描述
                        $describe = $_POST['describe'];
                        //获取图片ID
                        $id = $_POST['video_hidden'];
                        //创建时间
                        $time = date('Y-m-d H:i:s');
                        //文件路径
                        $file_path = '/video_uploads/'.$filename;
                        //视频类型
                        $video_type = $_POST['video_type'];
                        //视频路径
                        $video_path = $_POST['video_path'];
                        //数据库操作
                        $num = DB::table('cdn_video')->where('id',$id)->update(
                            ['description'=>$describe,'video_type'=>$video_type,'image_path'=>$file_path,'video_path'=>$video_path,'create_time'=>$time]
                        );
                        if($num == 1){
                            echo "<script>alert('视频信息修改成功')</script>";
                            return self::cdn_video();
                        }else{
                            echo "<script>alert('视频信息修改失败')</script>";
                            return self::cdn_video();
                        }
                    }
                }
            }
        }
    }

    public function admin_file_upload(){
        @session_start();
        if(!isset($_SESSION['admin_name'])){
            return redirect('/admin/login');
        }
        return view('admin_file_upload');
    }

    public function admin_file_doInsert(Request $request){
        if($request->isMethod('post')){
            $file = $request->file('goods_file');
            //判断文件是否上传成功
            if($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                var_dump($originalName);
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType(); 
                //临时文件绝对路径
                $realPath = $file->getRealPath();
                //文件名(最终)
                $filename = $originalName;
                //上传
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                //上传成功
                if($bool){
                    echo "<script>alert(".$filename.")</script>";
                }else{
                    echo "<script>alert('上传失败')</script>";
                }
            }
        }
    } 

    
}
