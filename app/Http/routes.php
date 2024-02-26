<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*************************************************前台***************************************************/
/*************************************移动端*********************************/
Route::group(['domain' => 'm.ajljy.com'], function(){
	//主页
	Route::get('/','MobileController@index');
	//安吉拉教学特色二级(亿童课程)
	Route::get('/teaching_yt','MobileController@teaching_yt');
	//安吉拉教学特色二级(亿童课程)(标题栏链接)
	Route::get('/teaching_yt{test}','MobileController@teaching_yt');
	//安吉拉教学特色二级(布朗课程)
	Route::get('/teaching_bl','MobileController@teaching_bl');
	//安吉拉教学特色二级(布朗课程)(标题栏链接)
	Route::get('/teaching_bl{test}','MobileController@teaching_bl');
	//安吉拉教学特色二级(艺术创想)
	Route::get('/teaching_ys','MobileController@teaching_ys');
	//安吉拉教学特色二级(艺术创想)(标题栏链接)
	Route::get('/teaching_ys{test}','MobileController@teaching_ys');
	//安吉拉教学特色二级(安吉拉早教)
	Route::get('/teaching_zj','MobileController@teaching_zj');
	//安吉拉教学特色二级(安吉拉早教)(标题栏链接)
	Route::get('/teaching_zj{test}','MobileController@teaching_zj');
	//安吉拉教学特色三级
	Route::get('/teaching/details/{id}','MobileController@teaching_details')->where('id','[0-9]+');
	//安吉拉文化
	Route::get('/culture','MobileController@culture');
	//安吉拉文化(锚链接)
	Route::get('/culture{test}','MobileController@culture');
	//安吉拉文化三级
	Route::get('/culture/details/{id}','MobileController@culture_details')->where('id','[0-9]+');
	//园所动态二级(社会活动)
	Route::get('/news_sh','MobileController@news_sh');
	//园所动态二级(社会活动)(标题栏链接)
	Route::get('/news_sh{test}','MobileController@news_sh');
	//园所动态二级(节日活动)
	Route::get('/news_jr','MobileController@news_jr');
	//园所动态二级(节日活动)(标题栏链接)
	Route::get('/news_jr{test}','MobileController@news_jr');
	//园所动态二级(班级活动)
	Route::get('/news_bj','MobileController@news_bj');
	//园所动态二级(班级活动)(标题栏链接)
	Route::get('/news_bj{test}','MobileController@news_bj');
	//园所动态二级(父母沙龙)
	Route::get('/news_fm','MobileController@news_fm');
	//园所动态二级(父母沙龙)(标题栏链接)
	Route::get('/news_fm{test}','MobileController@news_fm');
	//园所动态三级
	Route::get('/news/details/{id}','MobileController@news_details')->where('id','[0-9]+');
	//常青藤课程
	Route::get('/curriculum','MobileController@curriculum');
	//关于我们
	Route::get('/about','MobileController@about');
	//关于我们(锚链接)
	Route::get('/about{test}','MobileController@about');
	//园所分部三级详情
	Route::get('/about/details/{id}','MobileController@about_details')->where('id','[0-9]+');
});

/*************************************移动端*********************************/
	//主页
	Route::get('/','MobileController@index');
	//安吉拉教学特色二级(亿童课程)
	Route::get('/teaching_yt','MobileController@teaching_yt');
	//安吉拉教学特色二级(亿童课程)(标题栏链接)
	Route::get('/teaching_yt{test}','MobileController@teaching_yt');
	//安吉拉教学特色二级(布朗课程)
	Route::get('/teaching_bl','MobileController@teaching_bl');
	//安吉拉教学特色二级(布朗课程)(标题栏链接)
	Route::get('/teaching_bl{test}','MobileController@teaching_bl');
	//安吉拉教学特色二级(艺术创想)
	Route::get('/teaching_ys','MobileController@teaching_ys');
	//安吉拉教学特色二级(艺术创想)(标题栏链接)
	Route::get('/teaching_ys{test}','MobileController@teaching_ys');
	//安吉拉教学特色二级(安吉拉早教)
	Route::get('/teaching_zj','MobileController@teaching_zj');
	//安吉拉教学特色二级(安吉拉早教)(标题栏链接)
	Route::get('/teaching_zj{test}','MobileController@teaching_zj');
	//安吉拉教学特色三级
	Route::get('/teaching/details/{id}','MobileController@teaching_details')->where('id','[0-9]+');
	//安吉拉文化
	Route::get('/culture','MobileController@culture');
	//安吉拉文化(锚链接)
	Route::get('/culture{test}','MobileController@culture');
	//安吉拉文化三级
	Route::get('/culture/details/{id}','MobileController@culture_details')->where('id','[0-9]+');
	//园所动态二级(社会活动)
	Route::get('/news_sh','MobileController@news_sh');
	//园所动态二级(社会活动)(标题栏链接)
	Route::get('/news_sh{test}','MobileController@news_sh');
	//园所动态二级(节日活动)
	Route::get('/news_jr','MobileController@news_jr');
	//园所动态二级(节日活动)(标题栏链接)
	Route::get('/news_jr{test}','MobileController@news_jr');
	//园所动态二级(班级活动)
	Route::get('/news_bj','MobileController@news_bj');
	//园所动态二级(班级活动)(标题栏链接)
	Route::get('/news_bj{test}','MobileController@news_bj');
	//园所动态二级(父母沙龙)
	Route::get('/news_fm','MobileController@news_fm');
	//园所动态二级(父母沙龙)(标题栏链接)
	Route::get('/news_fm{test}','MobileController@news_fm');
	//园所动态三级
	Route::get('/news/details/{id}','MobileController@news_details')->where('id','[0-9]+');
	//常青藤课程
	Route::get('/curriculum','MobileController@curriculum');
	//关于我们
	Route::get('/about','MobileController@about');
	//关于我们(锚链接)
	Route::get('/about{test}','MobileController@about');
	//园所分部三级详情
	Route::get('/about/details/{id}','MobileController@about_details')->where('id','[0-9]+');

/*************************************PC端*********************************/
//主页
Route::get('/','IndexController@index');
//安吉拉教学特色二级(亿童课程)
Route::get('/teaching_yt','IndexController@teaching_yt');
//安吉拉教学特色二级(亿童课程)(标题栏链接)
Route::get('/teaching_yt{test}','IndexController@teaching_yt');
//安吉拉教学特色二级(布朗课程)
Route::get('/teaching_bl','IndexController@teaching_bl');
//安吉拉教学特色二级(布朗课程)(标题栏链接)
Route::get('/teaching_bl{test}','IndexController@teaching_bl');
//安吉拉教学特色二级(艺术创想)
Route::get('/teaching_ys','IndexController@teaching_ys');
//安吉拉教学特色二级(艺术创想)(标题栏链接)
Route::get('/teaching_ys{test}','IndexController@teaching_ys');
//安吉拉教学特色二级(安吉拉早教)
Route::get('/teaching_zj','IndexController@teaching_zj');
//安吉拉教学特色二级(安吉拉早教)(标题栏链接)
Route::get('/teaching_zj{test}','IndexController@teaching_zj');
//安吉拉教学特色三级
Route::get('/teaching/details/{id}','IndexController@teaching_details')->where('id','[0-9]+');
//安吉拉文化
Route::get('/culture','IndexController@culture');
//安吉拉文化(锚链接)
Route::get('/culture{test}','IndexController@culture');
//安吉拉文化三级
Route::get('/culture/details/{id}','IndexController@culture_details')->where('id','[0-9]+');
//园所动态二级(社会活动)
Route::get('/news_sh','IndexController@news_sh');
//园所动态二级(社会活动)(标题栏链接)
Route::get('/news_sh{test}','IndexController@news_sh');
//园所动态二级(节日活动)
Route::get('/news_jr','IndexController@news_jr');
//园所动态二级(节日活动)(标题栏链接)
Route::get('/news_jr{test}','IndexController@news_jr');
//园所动态二级(班级活动)
Route::get('/news_bj','IndexController@news_bj');
//园所动态二级(班级活动)(标题栏链接)
Route::get('/news_bj{test}','IndexController@news_bj');
//园所动态二级(父母沙龙)
Route::get('/news_fm','IndexController@news_fm');
//园所动态二级(父母沙龙)(标题栏链接)
Route::get('/news_fm{test}','IndexController@news_fm');
//园所动态三级
Route::get('/news/details/{id}','IndexController@news_details')->where('id','[0-9]+');
//常青藤课程
Route::get('/curriculum','IndexController@curriculum');
//关于我们
Route::get('/about','IndexController@about');
//关于我们(锚链接)
Route::get('/about{test}','IndexController@about');
//园所分部三级详情
Route::get('/about/details/{id}','IndexController@about_details')->where('id','[0-9]+');


/*************************************PC端*********************************/



/*************************************************前台***************************************************/



/*********************************************************后台管理***************************************************/
//后台管理
/*************************************管理员********************************************/
Route::get('/admin/login','AdminController@login');
Route::get('/admin/lock','AdminController@adminLock');
Route::post('/admin/locklogin','AdminController@lockLogin');
Route::get('/admin/logout','AdminController@logout');
Route::post('/admin/dologin','AdminController@doLogin');
Route::get('/admin/adminindex','AdminController@adminIndex');
Route::get('/admin/update','AdminController@update');
Route::post('/admin/self/doupdate','AdminController@doUpdate');
Route::get('/admin/admin','AdminController@admin');
Route::post('/admin/dodelete','AdminController@admin_doDelete');
Route::get('/admin/insert','AdminController@admin_insert');
Route::post('/admin/doinsert','AdminController@admin_doInsert');
Route::get('/admin/update/{id}','AdminController@admin_update')->where('id', '[0-9]+');
Route::post('/admin/doupdate/{id}','AdminController@admin_doUpdate')->where('id', '[0-9]+');
Route::get('/admin/role','AdminController@admin_role');
Route::get('/admin/role/insert','AdminController@admin_role_insert');
Route::post('/admin/role/doinsert','AdminController@do_admin_role_insert');
Route::post('/admin/role/dodelete','AdminController@admin_role_doDelete');
Route::get('/admin/role/update/{id}','AdminController@admin_role_update')->where('id', '[0-9]+');
Route::post('/admin/role/doupdate/{id}','AdminController@admin_role_doUpdate')->where('id', '[0-9]+');
Route::get('/admin/power','AdminController@admin_power');
Route::get('/admin/power/insert','AdminController@admin_power_insert');
Route::post('/admin/power/doinsert','AdminController@admin_power_doInsert');
Route::post('/admin/power/dodelete','AdminController@admin_power_doDelete');
Route::get('/admin/power/update/{id}','AdminController@admin_power_update')->where('id', '[0-9]+');
Route::post('/admin/power/doupdate/{id}','AdminController@admin_power_doUpdate')->where('id', '[0-9]+');
//七牛云视频上传
Route::get('/admin/upload','AdminController@admin_upload');
//上传图片
Route::get('/admin/pic_upload','AdminController@admin_pic_upload');
//do上传图片新增
Route::post('/admin/pic_doinsert','AdminController@admin_pic_doInsert');
//cdn图片管理
Route::get('/admin/cdnimage','AdminController@cdn_image');
//cdn图片删除
Route::post('/admin/cdnimage/dodelete','AdminController@admin_cdnimage_doDelete');
//cdn图片编辑
Route::get('/admin/image/update/{id}','AdminController@admin_image_update')->where('id', '[0-9]+');
//cdnDoUpdate(图片)
Route::post('/admin/pic_doupdate','AdminController@admin_image_doUpdate');
//cdn视频管理
Route::get('/admin/cdnvideo','AdminController@cdn_video');
//上传视频
Route::get('/admin/video_upload','AdminController@admin_video_upload');
//do上传视频新增
Route::post('/admin/video_doinsert','AdminController@admin_video_doInsert');
//cdn视频删除
Route::post('/admin/cdnvideo/dodelete','AdminController@admin_cdnvideo_doDelete');
//cdn视频编辑
Route::get('/admin/video/update/{id}','AdminController@admin_video_update')->where('id', '[0-9]+');
//cdnDoUpdate(视频)
Route::post('/admin/video_doupdate','AdminController@admin_video_doUpdate');
/*************************************管理员********************************************/
//banner图管理
Route::get('/banner/banner_pic','BannerController@banner_pic');
//banner图管理编辑
Route::get('/banner/banner_pic/update/{id}','BannerController@banner_pic_update')->where('id', '[0-9]+');
//dobanner图管理编辑
Route::post('/banner/banner_pic/doupdate/{id}','BannerController@banner_pic_doUpdate')->where('id', '[0-9]+');
//网站信息维护(底部)
Route::get('/info/info_index','InfoController@info_index');
//底部信息编辑
Route::get('/info/info_index/update/{id}','InfoController@info_index_update')->where('id', '[0-9]+');
//do底部信息编辑
Route::post('/info/info_index/doupdate/{id}','InfoController@info_index_doUpdate')->where('id', '[0-9]+');
//首页安吉拉文化封面图
Route::get('/home/culture_cover','HomeController@culture_cover');
//首页安吉拉文化封面图编辑
Route::get('/home/culture_cover/update/{id}','HomeController@culture_cover_update')->where('id', '[0-9]+');
//do首页安吉拉文化封面图编辑
Route::post('/home/culture_cover/doupdate/{id}','HomeController@culture_cover_doUpdate')->where('id', '[0-9]+');
//首页底图
Route::get('/home/last_pic','HomeController@last_pic');
//首页底图编辑
Route::get('/home/last_pic/update/{id}','HomeController@last_pic_update')->where('id', '[0-9]+');
//do首页底图编辑
Route::post('/home/last_pic/doupdate/{id}','HomeController@last_pic_doUpdate')->where('id', '[0-9]+');
//教学特色(亿童课程)
Route::get('/admin/teaching_yt','TeachingController@teaching_yt');
//教学特色删除(亿童课程)
Route::post('/admin/teaching_yt/dodelete','TeachingController@teaching_yt_doDelete');
//新增教学特色(亿童课程)
Route::get('/admin/teaching_yt/insert','TeachingController@teaching_yt_insert');
//do新增教学特色(亿童课程)
Route::post('/admin/teaching_yt/doinsert','TeachingController@teaching_yt_doInsert');
//教学特色编辑(亿童课程)
Route::get('/admin/teaching_yt/update/{id}','TeachingController@teaching_yt_update')->where('id', '[0-9]+');
//do教学特色编辑(亿童课程)
Route::post('/admin/teaching_yt/doupdate/{id}','TeachingController@teaching_yt_doUpdate')->where('id', '[0-9]+');
//课程详情标签展示(亿童课程)
Route::get('/admin/teaching_yt/label/{id}','TeachingController@teaching_yt_label_index')->where('id', '[0-9]+');
//删除课程详情标签(亿童课程)
Route::post('/admin/teaching_yt/label/dodelete','TeachingController@teaching_yt_label_doDelete');
//新增课程详情标签(亿童课程)
Route::any('/admin/teaching_yt/label/insert/{id}','TeachingController@teaching_yt_label_insert')->where('id', '[0-9]+');
//do新增课程详情标签(亿童课程)
Route::post('/admin/teaching_yt/label/doinsert','TeachingController@teaching_yt_label_doInsert');
//课程详情标签编辑(亿童课程)
Route::get('/admin/teaching_yt/label/update/{id}','TeachingController@teaching_yt_label_update')->where('id', '[0-9]+');
//do课程详情标签编辑(亿童课程)
Route::post('/admin/teaching_yt/label/doUpdate/{id}','TeachingController@teaching_yt_label_doUpdate')->where('id', '[0-9]+');
//标签图文详情展示(亿童课程)
Route::get('/admin/teaching_yt/label/details/{id}','TeachingController@teaching_yt_label_details')->where('id', '[0-9]+');
//标签图文详情删除(亿童课程)
Route::post('/admin/teaching_yt/label/details/dodelete','TeachingController@teaching_yt_label_details_doDelete');
//标签图文详情图片新增(亿童课程)
Route::any('/admin/teaching_yt/label/details/pic/insert/{id}','TeachingController@teaching_yt_label_details_pic_insert')->where('id', '[0-9]+');
//do标签图文详情图片新增(亿童课程)
Route::post('/admin/teaching_yt/label/details/pic/doinsert','TeachingController@teaching_yt_label_details_pic_doInsert');
//标签图文详情文字新增(亿童课程)
Route::any('/admin/teaching_yt/label/details/text/insert/{id}','TeachingController@teaching_yt_label_details_text_insert')->where('id', '[0-9]+');
//do标签图文详情文字新增(亿童课程)
Route::post('/admin/teaching_yt/label/details/text/doinsert','TeachingController@teaching_yt_label_details_text_doInsert');
//标签图文详情编辑(亿童课程)
Route::get('/admin/teaching_yt/label/details/text/update/{id}','TeachingController@teaching_yt_label_details_text_update')->where('id', '[0-9]+');
//do标签图文详情编辑(亿童课程)
Route::post('/admin/teaching_yt/label/details/text/doupdate/{id}','TeachingController@teaching_yt_label_details_text_doUpdate')->where('id', '[0-9]+');
//教学特色(布朗课程)
Route::get('/admin/teaching_bl','TeachingController@teaching_bl');
//教学特色删除(布朗课程)
Route::post('/admin/teaching_bl/dodelete','TeachingController@teaching_bl_doDelete');
//新增教学特色(布朗课程)
Route::get('/admin/teaching_bl/insert','TeachingController@teaching_bl_insert');
//do新增教学特色(布朗课程)
Route::post('/admin/teaching_bl/doinsert','TeachingController@teaching_bl_doInsert');
//教学特色编辑(布朗课程)
Route::get('/admin/teaching_bl/update/{id}','TeachingController@teaching_bl_update')->where('id', '[0-9]+');
//do教学特色编辑(布朗课程)
Route::post('/admin/teaching_bl/doupdate/{id}','TeachingController@teaching_bl_doUpdate')->where('id', '[0-9]+');
//课程详情标签展示(布朗课程)
Route::get('/admin/teaching_bl/label/{id}','TeachingController@teaching_bl_label_index')->where('id', '[0-9]+');
//删除课程详情标签(布朗课程)
Route::post('/admin/teaching_bl/label/dodelete','TeachingController@teaching_bl_label_doDelete');
//新增课程详情标签(布朗课程)
Route::any('/admin/teaching_bl/label/insert/{id}','TeachingController@teaching_bl_label_insert')->where('id', '[0-9]+');
//do新增课程详情标签(布朗课程)
Route::post('/admin/teaching_bl/label/doinsert','TeachingController@teaching_bl_label_doInsert');
//课程详情标签编辑(布朗课程)
Route::get('/admin/teaching_bl/label/update/{id}','TeachingController@teaching_bl_label_update')->where('id', '[0-9]+');
//do课程详情标签编辑(布朗课程)
Route::post('/admin/teaching_bl/label/doUpdate/{id}','TeachingController@teaching_bl_label_doUpdate')->where('id', '[0-9]+');
//标签图文详情展示(布朗课程)
Route::get('/admin/teaching_bl/label/details/{id}','TeachingController@teaching_bl_label_details')->where('id', '[0-9]+');
//标签图文详情删除(布朗课程)
Route::post('/admin/teaching_bl/label/details/dodelete','TeachingController@teaching_bl_label_details_doDelete');
//标签图文详情图片新增(布朗课程)
Route::any('/admin/teaching_bl/label/details/pic/insert/{id}','TeachingController@teaching_bl_label_details_pic_insert')->where('id', '[0-9]+');
//do标签图文详情图片新增(布朗课程)
Route::post('/admin/teaching_bl/label/details/pic/doinsert','TeachingController@teaching_bl_label_details_pic_doInsert');
//标签图文详情文字新增(布朗课程)
Route::any('/admin/teaching_bl/label/details/text/insert/{id}','TeachingController@teaching_bl_label_details_text_insert')->where('id', '[0-9]+');
//do标签图文详情文字新增(布朗课程)
Route::post('/admin/teaching_bl/label/details/text/doinsert','TeachingController@teaching_bl_label_details_text_doInsert');
//标签图文详情编辑(布朗课程)
Route::get('/admin/teaching_bl/label/details/text/update/{id}','TeachingController@teaching_bl_label_details_text_update')->where('id', '[0-9]+');
//do标签图文详情编辑(布朗课程)
Route::post('/admin/teaching_bl/label/details/text/doupdate/{id}','TeachingController@teaching_bl_label_details_text_doUpdate')->where('id', '[0-9]+');
//教学特色(艺术创想)
Route::get('/admin/teaching_ys','TeachingController@teaching_ys');
//教学特色删除(艺术创想)
Route::post('/admin/teaching_ys/dodelete','TeachingController@teaching_ys_doDelete');
//新增教学特色(艺术创想)
Route::get('/admin/teaching_ys/insert','TeachingController@teaching_ys_insert');
//do新增教学特色(艺术创想)
Route::post('/admin/teaching_ys/doinsert','TeachingController@teaching_ys_doInsert');
//教学特色编辑(艺术创想)
Route::get('/admin/teaching_ys/update/{id}','TeachingController@teaching_ys_update')->where('id', '[0-9]+');
//do教学特色编辑(艺术创想)
Route::post('/admin/teaching_ys/doupdate/{id}','TeachingController@teaching_ys_doUpdate')->where('id', '[0-9]+');
//课程详情标签展示(艺术创想)
Route::get('/admin/teaching_ys/label/{id}','TeachingController@teaching_ys_label_index')->where('id', '[0-9]+');
//删除课程详情标签(艺术创想)
Route::post('/admin/teaching_ys/label/dodelete','TeachingController@teaching_ys_label_doDelete');
//新增课程详情标签(艺术创想)
Route::any('/admin/teaching_ys/label/insert/{id}','TeachingController@teaching_ys_label_insert')->where('id', '[0-9]+');
//do新增课程详情标签(艺术创想)
Route::post('/admin/teaching_ys/label/doinsert','TeachingController@teaching_ys_label_doInsert');
//课程详情标签编辑(艺术创想)
Route::get('/admin/teaching_ys/label/update/{id}','TeachingController@teaching_ys_label_update')->where('id', '[0-9]+');
//do课程详情标签编辑(艺术创想)
Route::post('/admin/teaching_ys/label/doUpdate/{id}','TeachingController@teaching_ys_label_doUpdate')->where('id', '[0-9]+');
//标签图文详情展示(艺术创想)
Route::get('/admin/teaching_ys/label/details/{id}','TeachingController@teaching_ys_label_details')->where('id', '[0-9]+');
//标签图文详情删除(艺术创想)
Route::post('/admin/teaching_ys/label/details/dodelete','TeachingController@teaching_ys_label_details_doDelete');
//标签图文详情图片新增(艺术创想)
Route::any('/admin/teaching_ys/label/details/pic/insert/{id}','TeachingController@teaching_ys_label_details_pic_insert')->where('id', '[0-9]+');
//do标签图文详情图片新增(艺术创想)
Route::post('/admin/teaching_ys/label/details/pic/doinsert','TeachingController@teaching_ys_label_details_pic_doInsert');
//标签图文详情文字新增(艺术创想)
Route::any('/admin/teaching_ys/label/details/text/insert/{id}','TeachingController@teaching_ys_label_details_text_insert')->where('id', '[0-9]+');
//do标签图文详情文字新增(艺术创想)
Route::post('/admin/teaching_ys/label/details/text/doinsert','TeachingController@teaching_ys_label_details_text_doInsert');
//标签图文详情编辑(艺术创想)
Route::get('/admin/teaching_ys/label/details/text/update/{id}','TeachingController@teaching_ys_label_details_text_update')->where('id', '[0-9]+');
//do标签图文详情编辑(艺术创想)
Route::post('/admin/teaching_ys/label/details/text/doupdate/{id}','TeachingController@teaching_ys_label_details_text_doUpdate')->where('id', '[0-9]+');
//教学特色(安吉拉早教)
Route::get('/admin/teaching_zj','TeachingController@teaching_zj');
//教学特色删除(安吉拉早教)
Route::post('/admin/teaching_zj/dodelete','TeachingController@teaching_zj_doDelete');
//新增教学特色(安吉拉早教)
Route::get('/admin/teaching_zj/insert','TeachingController@teaching_zj_insert');
//do新增教学特色(安吉拉早教)
Route::post('/admin/teaching_zj/doinsert','TeachingController@teaching_zj_doInsert');
//教学特色编辑(安吉拉早教)
Route::get('/admin/teaching_zj/update/{id}','TeachingController@teaching_zj_update')->where('id', '[0-9]+');
//do教学特色编辑(安吉拉早教)
Route::post('/admin/teaching_zj/doupdate/{id}','TeachingController@teaching_zj_doUpdate')->where('id', '[0-9]+');
//课程详情标签展示(安吉拉早教)
Route::get('/admin/teaching_zj/label/{id}','TeachingController@teaching_zj_label_index')->where('id', '[0-9]+');
//删除课程详情标签(安吉拉早教)
Route::post('/admin/teaching_zj/label/dodelete','TeachingController@teaching_zj_label_doDelete');
//新增课程详情标签(安吉拉早教)
Route::any('/admin/teaching_zj/label/insert/{id}','TeachingController@teaching_zj_label_insert')->where('id', '[0-9]+');
//do新增课程详情标签(安吉拉早教)
Route::post('/admin/teaching_zj/label/doinsert','TeachingController@teaching_zj_label_doInsert');
//课程详情标签编辑(安吉拉早教)
Route::get('/admin/teaching_zj/label/update/{id}','TeachingController@teaching_zj_label_update')->where('id', '[0-9]+');
//do课程详情标签编辑(安吉拉早教)
Route::post('/admin/teaching_zj/label/doUpdate/{id}','TeachingController@teaching_zj_label_doUpdate')->where('id', '[0-9]+');
//标签图文详情展示(安吉拉早教)
Route::get('/admin/teaching_zj/label/details/{id}','TeachingController@teaching_zj_label_details')->where('id', '[0-9]+');
//标签图文详情删除(安吉拉早教)
Route::post('/admin/teaching_zj/label/details/dodelete','TeachingController@teaching_zj_label_details_doDelete');
//标签图文详情图片新增(安吉拉早教)
Route::any('/admin/teaching_zj/label/details/pic/insert/{id}','TeachingController@teaching_zj_label_details_pic_insert')->where('id', '[0-9]+');
//do标签图文详情图片新增(安吉拉早教)
Route::post('/admin/teaching_zj/label/details/pic/doinsert','TeachingController@teaching_zj_label_details_pic_doInsert');
//标签图文详情文字新增(安吉拉早教)
Route::any('/admin/teaching_zj/label/details/text/insert/{id}','TeachingController@teaching_zj_label_details_text_insert')->where('id', '[0-9]+');
//do标签图文详情文字新增(安吉拉早教)
Route::post('/admin/teaching_zj/label/details/text/doinsert','TeachingController@teaching_zj_label_details_text_doInsert');
//标签图文详情编辑(安吉拉早教)
Route::get('/admin/teaching_zj/label/details/text/update/{id}','TeachingController@teaching_zj_label_details_text_update')->where('id', '[0-9]+');
//do标签图文详情编辑(安吉拉早教)
Route::post('/admin/teaching_zj/label/details/text/doupdate/{id}','TeachingController@teaching_zj_label_details_text_doUpdate')->where('id', '[0-9]+');
//常青藤课程(理念基础图文)
Route::get('/admin/curriculum_idea/chart','CourseController@curriculum_idea');
//常青藤课程编辑文本(理念基础图文)
Route::get('/admin/curriculum_idea/chart_text/update/{id}','CourseController@curriculum_idea_text_update')->where('id', '[0-9]+');
//do常青藤课程编辑文本(理念基础图文)
Route::post('/admin/curriculum_idea/chart_text/doupdate/{id}','CourseController@curriculum_idea_text_doUpdate')->where('id', '[0-9]+');
//常青藤课程编辑图片(理念基础图文)
Route::get('/admin/curriculum_idea/chart_pic/update/{id}','CourseController@curriculum_idea_pic_update')->where('id', '[0-9]+');
//do常青藤课程编辑图片(理念基础图文)
Route::post('/admin/curriculum_idea/chart_pic/doupdate/{id}','CourseController@curriculum_idea_pic_doUpdate')->where('id', '[0-9]+');
//常青藤课程(理念基础段落)
Route::get('/admin/curriculum_idea/paragraph','CourseController@paragraph_idea');
//常青藤课程编辑(理念基础段落)
Route::get('/admin/curriculum_idea/paragraph/update/{id}','CourseController@paragraph_idea_update')->where('id', '[0-9]+');
//do常青藤课程编辑(理念基础段落)
Route::post('/admin/curriculum_idea/paragraph/doupdate/{id}','CourseController@paragraph_idea_doUpdate')->where('id', '[0-9]+');
//常青藤课程模块简介(协商式课程)
Route::get('/admin/consultative_course/text','CourseController@consultative_course_text');
//常青藤课程模块简介编辑文本(协商式课程)
Route::get('/admin/consultative_course/text/update/{id}','CourseController@consultative_course_text_update')->where('id', '[0-9]+');
//do常青藤课程模块简介编辑文本(协商式课程)
Route::post('/admin/consultative_course/text/doupdate/{id}','CourseController@consultative_course_text_doUpdate')->where('id', '[0-9]+');
//常青藤课程段落简介(协商式课程)
Route::get('/admin/consultative_course/paragraph','CourseController@consultative_course_paragraph');
//常青藤课程段落简介编辑(协商式课程)
Route::get('/admin/consultative_course/paragraph/update/{id}','CourseController@consultative_course_paragraph_update')->where('id', '[0-9]+');
//do常青藤课程段落简介编辑(协商式课程)
Route::post('/admin/consultative_course/paragraph/doupdate/{id}','CourseController@consultative_course_paragraph_doUpdate')->where('id', '[0-9]+');
//常青藤课程图文展示(协商式课程)
Route::get('/admin/consultative_course/image_text','CourseController@consultative_course_image_text');
//常青藤课程图文展示删除(协商式课程)
Route::post('/admin/consultative_course/image_text/dodelete','CourseController@consultative_course_image_text_doDelete');
//新增常青藤课程图文(协商式课程)
Route::get('/admin/consultative_course/image_text/insert','CourseController@consultative_course_image_text_insert');
//do新增常青藤课程图文(协商式课程)
Route::post('/admin/consultative_course/image_text/doinsert','CourseController@consultative_course_image_text_doInsert');
//常青藤课程图文编辑(协商式课程)
Route::get('/admin/consultative_course/image_text/update/{id}','CourseController@consultative_course_image_text_update')->where('id', '[0-9]+');
//do常青藤课程图文编辑(协商式课程)
Route::post('/admin/consultative_course/image_text/doupdate/{id}','CourseController@consultative_course_image_text_doUpdate')->where('id', '[0-9]+');
//安吉拉文化教育理念
Route::get('/admin/education_concept','EducationController@education_concept');
//安吉拉文化教育理念编辑
Route::get('/admin/education_concept/update/{id}','EducationController@education_concept_update')->where('id', '[0-9]+');
//do安吉拉文化教育理念编辑
Route::post('/admin/education_concept/doupdate/{id}','EducationController@education_concept_doUpdate')->where('id', '[0-9]+');
//安吉拉说
Route::get('/admin/education_speak','EducationController@education_speak');
//安吉拉说编辑
Route::get('/admin/education_speak/update/{id}','EducationController@education_speak_update')->where('id', '[0-9]+');
//do安吉拉说编辑
Route::post('/admin/education_speak/doupdate/{id}','EducationController@education_speak_doUpdate')->where('id', '[0-9]+');
//安吉拉团队图文
Route::get('/admin/education_team','EducationController@education_team');
//安吉拉团队图文编辑
Route::get('/admin/education_team/update/{id}','EducationController@education_team_update')->where('id', '[0-9]+');
//do安吉拉团队图文编辑
Route::post('/admin/education_team/doupdate/{id}','EducationController@education_team_doUpdate')->where('id', '[0-9]+');
//安吉拉团队教师展示
Route::get('/admin/education_teacher','EducationController@education_teacher');
//安吉拉团队教师展示删除
Route::post('/admin/education_teacher/dodelete','EducationController@education_teacher_doDelete');
//新增安吉拉团队教师
Route::get('/admin/education_teacher/insert','EducationController@education_teacher_insert');
//do新增安吉拉团队教师
Route::post('/admin/education_teacher/doinsert','EducationController@education_teacher_doInsert');
//安吉拉团队教师编辑
Route::get('/admin/education_teacher/update/{id}','EducationController@education_teacher_update')->where('id', '[0-9]+');
//do安吉拉团队教师编辑
Route::post('/admin/education_teacher/doupdate/{id}','EducationController@education_teacher_doUpdate')->where('id', '[0-9]+');
//安吉拉文化
Route::get('/admin/culture','EducationController@culture');
//安吉拉文化编辑
Route::get('/admin/culture/update/{id}','EducationController@culture_update')->where('id', '[0-9]+');
//do安吉拉文化编辑
Route::post('/admin/culture/doupdate/{id}','EducationController@culture_doUpdate')->where('id', '[0-9]+');
//安吉拉文化标签展示
Route::get('/admin/culture/label/{id}','EducationController@culture_label_index')->where('id', '[0-9]+');
//删除安吉拉文化标签
Route::post('/admin/culture/label/dodelete','EducationController@culture_label_index_doDelete');
//新增安吉拉文化标签
Route::any('/admin/culture/label/insert/{id}','EducationController@culture_label_index_insert')->where('id', '[0-9]+');
//do新增安吉拉文化标签
Route::post('/admin/culture/label/doinsert','EducationController@culture_label_index_doInsert');
//安吉拉文化标签编辑
Route::get('/admin/culture/label/update/{id}','EducationController@culture_label_index_update')->where('id', '[0-9]+');
//do安吉拉文化标签编辑
Route::post('/admin/culture/label/doUpdate/{id}','EducationController@culture_label_index_doUpdate')->where('id', '[0-9]+');
//标签图文详情展示
Route::get('/admin/culture/label/details/{id}','EducationController@culture_label_index_label_details')->where('id', '[0-9]+');
// //标签图文详情删除
Route::post('/admin/culture/label/details/dodelete','EducationController@culture_label_index_label_details_doDelete');
//标签图文详情图片新增
Route::any('/admin/culture/label/details/pic/insert/{id}','EducationController@culture_label_index_label_details_pic_insert')->where('id', '[0-9]+');
//do标签图文详情图片新增
Route::post('/admin/culture/label/details/pic/doinsert','EducationController@culture_label_index_label_details_pic_doInsert');
//标签图文详情文字新增
Route::any('/admin/culture/label/details/text/insert/{id}','EducationController@culture_label_index_label_details_text_insert')->where('id', '[0-9]+');
//do标签图文详情文字新增
Route::post('/admin/culture/label/details/text/doinsert','EducationController@culture_label_index_label_details_text_doInsert');
//标签图文详情编辑
Route::get('/admin/culture/label/details/text/update/{id}','EducationController@culture_label_details_text_update')->where('id', '[0-9]+');
//do标签图文详情编辑
Route::post('/admin/culture/label/details/text/doupdate/{id}','EducationController@culture_label_details_text_doUpdate')->where('id', '[0-9]+');
//安吉拉动态(社会活动)
Route::get('/admin/news_social','NewsController@news_social');
//安吉拉动态删除(社会活动)
Route::post('/admin/news_social/dodelete','NewsController@news_social_doDelete');
//新增安吉拉动态(社会活动)
Route::get('/admin/news_social/insert','NewsController@news_social_insert');
//do新增安吉拉动态(社会活动)
Route::post('/admin/news_social/doinsert','NewsController@news_social_doInsert');
//安吉拉动态编辑(社会活动)
Route::get('/admin/news_social/update/{id}','NewsController@news_social_update')->where('id', '[0-9]+');
//do安吉拉动态编辑(社会活动)
Route::post('/admin/news_social/doupdate/{id}','NewsController@news_social_doUpdate')->where('id', '[0-9]+');
//安吉拉动态详情展示(社会活动)
Route::get('/admin/news_social/details/{id}','NewsController@news_social_details')->where('id', '[0-9]+');
//安吉拉动态详情展示删除(社会活动)
Route::post('/admin/news_social/details/dodelete','NewsController@news_social_details_doDelete');
//安吉拉动态详情展示图片新增(社会活动)
Route::any('/admin/news_social/details/pic/insert/{id}','NewsController@news_social_details_pic_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示图片新增(社会活动)
Route::post('/admin/news_social/details/pic/doinsert','NewsController@news_social_details_pic_doInsert');
//安吉拉动态详情展示文本新增(社会活动)
Route::any('/admin/news_social/details/text/insert/{id}','NewsController@news_social_details_text_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示文本新增(社会活动)
Route::post('/admin/news_social/details/text/doinsert','NewsController@news_social_details_text_doInsert');
//安吉拉动态详情展示编辑(社会活动)
Route::get('/admin/news_social/details/update/{id}','NewsController@news_social_details_update')->where('id', '[0-9]+');
//do安吉拉动态详情展示编辑(社会活动)
Route::post('/admin/news_social/details/doupdate/{id}','NewsController@news_social_details_doUpdate')->where('id', '[0-9]+');
//安吉拉动态(节日活动)
Route::get('/admin/news_festival','NewsController@news_festival');
//安吉拉动态删除(节日活动)
Route::post('/admin/news_festival/dodelete','NewsController@news_festival_doDelete');
//新增安吉拉动态(节日活动)
Route::get('/admin/news_festival/insert','NewsController@news_festival_insert');
//do新增安吉拉动态(节日活动)
Route::post('/admin/news_festival/doinsert','NewsController@news_festival_doInsert');
//安吉拉动态编辑(节日活动)
Route::get('/admin/news_festival/update/{id}','NewsController@news_festival_update')->where('id', '[0-9]+');
//do安吉拉动态编辑(节日活动)
Route::post('/admin/news_festival/doupdate/{id}','NewsController@news_festival_doUpdate')->where('id', '[0-9]+');
//安吉拉动态详情展示(节日活动)
Route::get('/admin/news_festival/details/{id}','NewsController@news_festival_details')->where('id', '[0-9]+');
//安吉拉动态详情展示删除(节日活动)
Route::post('/admin/news_festival/details/dodelete','NewsController@news_festival_details_doDelete');
//安吉拉动态详情展示图片新增(节日活动)
Route::any('/admin/news_festival/details/pic/insert/{id}','NewsController@news_festival_details_pic_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示图片新增(节日活动)
Route::post('/admin/news_festival/details/pic/doinsert','NewsController@news_festival_details_pic_doInsert');
//安吉拉动态详情展示文本新增(节日活动)
Route::any('/admin/news_festival/details/text/insert/{id}','NewsController@news_festival_details_text_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示文本新增(节日活动)
Route::post('/admin/news_festival/details/text/doinsert','NewsController@news_festival_details_text_doInsert');
//安吉拉动态详情展示编辑(节日活动)
Route::get('/admin/news_festival/details/update/{id}','NewsController@news_festival_details_update')->where('id', '[0-9]+');
//do安吉拉动态详情展示编辑(节日活动)
Route::post('/admin/news_festival/details/doupdate/{id}','NewsController@news_festival_details_doUpdate')->where('id', '[0-9]+');
//安吉拉动态(班级活动)
Route::get('/admin/news_class','NewsController@news_class');
//安吉拉动态删除(班级活动)
Route::post('/admin/news_class/dodelete','NewsController@news_class_doDelete');
//新增安吉拉动态(班级活动)
Route::get('/admin/news_class/insert','NewsController@news_class_insert');
//do新增安吉拉动态(班级活动)
Route::post('/admin/news_class/doinsert','NewsController@news_class_doInsert');
//安吉拉动态编辑(班级活动)
Route::get('/admin/news_class/update/{id}','NewsController@news_class_update')->where('id', '[0-9]+');
//do安吉拉动态编辑(班级活动)
Route::post('/admin/news_class/doupdate/{id}','NewsController@news_class_doUpdate')->where('id', '[0-9]+');
//安吉拉动态详情展示(班级活动)
Route::get('/admin/news_class/details/{id}','NewsController@news_class_details')->where('id', '[0-9]+');
//安吉拉动态详情展示删除(班级活动)
Route::post('/admin/news_class/details/dodelete','NewsController@news_class_details_doDelete');
//安吉拉动态详情展示图片新增(班级活动)
Route::any('/admin/news_class/details/pic/insert/{id}','NewsController@news_class_details_pic_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示图片新增(班级活动)
Route::post('/admin/news_class/details/pic/doinsert','NewsController@news_class_details_pic_doInsert');
//安吉拉动态详情展示文本新增(班级活动)
Route::any('/admin/news_class/details/text/insert/{id}','NewsController@news_class_details_text_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示文本新增(班级活动)
Route::post('/admin/news_class/details/text/doinsert','NewsController@news_class_details_text_doInsert');
//安吉拉动态详情展示编辑(班级活动)
Route::get('/admin/news_class/details/update/{id}','NewsController@news_class_details_update')->where('id', '[0-9]+');
//do安吉拉动态详情展示编辑(班级活动)
Route::post('/admin/news_class/details/doupdate/{id}','NewsController@news_class_details_doUpdate')->where('id', '[0-9]+');
//安吉拉动态(父母沙龙)
Route::get('/admin/news_parents','NewsController@news_parents');
//安吉拉动态删除(父母沙龙)
Route::post('/admin/news_parents/dodelete','NewsController@news_parents_doDelete');
//新增安吉拉动态(父母沙龙)
Route::get('/admin/news_parents/insert','NewsController@news_parents_insert');
//do新增安吉拉动态(父母沙龙)
Route::post('/admin/news_parents/doinsert','NewsController@news_parents_doInsert');
//安吉拉动态编辑(父母沙龙)
Route::get('/admin/news_parents/update/{id}','NewsController@news_parents_update')->where('id', '[0-9]+');
//do安吉拉动态编辑(父母沙龙)
Route::post('/admin/news_parents/doupdate/{id}','NewsController@news_parents_doUpdate')->where('id', '[0-9]+');
//安吉拉动态详情展示(父母沙龙)
Route::get('/admin/news_parents/details/{id}','NewsController@news_parents_details')->where('id', '[0-9]+');
//安吉拉动态详情展示删除(父母沙龙)
Route::post('/admin/news_parents/details/dodelete','NewsController@news_parents_details_doDelete');
//安吉拉动态详情展示图片新增(父母沙龙)
Route::any('/admin/news_parents/details/pic/insert/{id}','NewsController@news_parents_details_pic_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示图片新增(父母沙龙)
Route::post('/admin/news_parents/details/pic/doinsert','NewsController@news_parents_details_pic_doInsert');
//安吉拉动态详情展示文本新增(父母沙龙)
Route::any('/admin/news_parents/details/text/insert/{id}','NewsController@news_parents_details_text_insert')->where('id', '[0-9]+');
//do安吉拉动态详情展示文本新增(父母沙龙)
Route::post('/admin/news_parents/details/text/doinsert','NewsController@news_parents_details_text_doInsert');
//安吉拉动态详情展示编辑(父母沙龙)
Route::get('/admin/news_parents/details/update/{id}','NewsController@news_parents_details_update')->where('id', '[0-9]+');
//do安吉拉动态详情展示编辑(父母沙龙)
Route::post('/admin/news_parents/details/doupdate/{id}','NewsController@news_parents_details_doUpdate')->where('id', '[0-9]+');
//关于安吉拉文本
Route::get('/admin/about_us','AboutController@about_us');
//关于安吉拉文本编辑
Route::get('/admin/about_us/update/{id}','AboutController@about_us_update')->where('id', '[0-9]+');
//do关于安吉拉文本编辑
Route::post('/admin/about_us/doupdate/{id}','AboutController@about_us_doUpdate')->where('id', '[0-9]+');
//关于安吉拉轮播图片
Route::get('/admin/about_us_pic','AboutController@about_us_pic');
//关于安吉拉轮播图片删除
Route::post('/admin/about_us_pic/dodelete','AboutController@about_us_pic_doDelete');
//新增关于安吉拉轮播图片
Route::get('/admin/about_us_pic/insert','AboutController@about_us_pic_insert');
//do新增关于安吉拉轮播图片
Route::post('/admin/about_us_pic/doinsert','AboutController@about_us_pic_doInsert');
//关于安吉拉轮播图片编辑
Route::get('/admin/about_us_pic/update/{id}','AboutController@about_us_pic_update')->where('id', '[0-9]+');
//do关于安吉拉轮播图片编辑
Route::post('/admin/about_us_pic/doupdate/{id}','AboutController@about_us_pic_doUpdate')->where('id', '[0-9]+');
//发展历程文本简介
Route::get('/admin/development_text','AboutController@development_text');
//发展历程文本简介编辑
Route::get('/admin/development_text/update/{id}','AboutController@development_text_update')->where('id', '[0-9]+');
//do发展历程文本简介编辑
Route::post('/admin/development_text/doupdate/{id}','AboutController@development_text_doUpdate')->where('id', '[0-9]+');
//发展历程时间轴
Route::get('/admin/development_timer_shaft','AboutController@development_timer_shaft');
//发展历程时间轴编辑
Route::get('/admin/development_timer_shaft/update/{id}','AboutController@development_timer_shaft_update')->where('id', '[0-9]+');
//do发展历程时间轴编辑
Route::post('/admin/development_timer_shaft/doupdate/{id}','AboutController@development_timer_shaft_doUpdate')->where('id', '[0-9]+');
//管理团队文本
Route::get('/admin/manage_team_text','AboutController@manage_team_text');
//管理团队文本编辑
Route::get('/admin/manage_team_text/update/{id}','AboutController@manage_team_text_update')->where('id', '[0-9]+');
//do管理团队文本编辑
Route::post('/admin/manage_team_text/doupdate/{id}','AboutController@manage_team_text_doUpdate')->where('id', '[0-9]+');
//管理团队成员展示
Route::get('/admin/manage_team','AboutController@manage_team');
//管理团队成员删除
Route::post('/admin/manage_team/dodelete','AboutController@manage_team_doDelete');
//新增管理团队成员
Route::get('/admin/manage_team/insert','AboutController@manage_team_insert');
//do新增管理团队成员
Route::post('/admin/manage_team/doinsert','AboutController@manage_team_doInsert');
//管理团队成员编辑
Route::get('/admin/manage_team/update/{id}','AboutController@manage_team_update')->where('id', '[0-9]+');
//do管理团队成员编辑
Route::post('/admin/manage_team/doupdate/{id}','AboutController@manage_team_doUpdate')->where('id', '[0-9]+');
//园所分部
Route::get('/admin/kindergarten','AboutController@kindergarten');
//园所分部删除
Route::post('/admin/kindergarten/dodelete','AboutController@kindergarten_doDelete');
//新增园所分部
Route::get('/admin/kindergarten/insert','AboutController@kindergarten_insert');
//do新增园所分部
Route::post('/admin/kindergarten/doinsert','AboutController@kindergarten_doInsert');
//园所分部编辑
Route::get('/admin/kindergarten/update/{id}','AboutController@kindergarten_update')->where('id', '[0-9]+');
//do园所分部编辑
Route::post('/admin/kindergarten/doupdate/{id}','AboutController@kindergarten_doUpdate')->where('id', '[0-9]+');
//园所分部标签展示
Route::get('/admin/kindergarten/label/{id}','AboutController@kindergarten_label_index')->where('id', '[0-9]+');
//删除园所分部标签
Route::post('/admin/kindergarten/label/dodelete','AboutController@kindergarten_label_doDelete');
//新增园所分部标签
Route::any('/admin/kindergarten/label/insert/{id}','AboutController@kindergarten_label_insert')->where('id', '[0-9]+');
//do新增园所分部标签
Route::post('/admin/kindergarten/label/doinsert','AboutController@kindergarten_label_doInsert');
//园所分部标签编辑
Route::get('/admin/kindergarten/label/update/{id}','AboutController@kindergarten_label_update')->where('id', '[0-9]+');
//do园所分部标签编辑
Route::post('/admin/kindergarten/label/doUpdate/{id}','AboutController@kindergarten_label_doUpdate')->where('id', '[0-9]+');
//园所分部标签图文详情展示
Route::get('/admin/kindergarten/label/details/{id}','AboutController@kindergarten_label_details')->where('id', '[0-9]+');
//园所分部标签图文详情删除
Route::post('/admin/kindergarten/label/details/dodelete','AboutController@kindergarten_label_details_doDelete');
//园所分部标签图片详情新增
Route::any('/admin/kindergarten/label/details/pic/insert/{id}','AboutController@kindergarten_label_details_pic_insert')->where('id', '[0-9]+');
//do园所分部标签图片详情新增
Route::post('/admin/kindergarten/label/details/pic/doinsert','AboutController@kindergarten_label_details_pic_doInsert');
//园所分部标签文字详情新增
Route::any('/admin/kindergarten/label/details/text/insert/{id}','AboutController@kindergarten_label_details_text_insert')->where('id', '[0-9]+');
//do园所分部标签文字详情新增
Route::post('/admin/kindergarten/label/details/text/doinsert','AboutController@kindergarten_label_details_text_doInsert');
//园所分部标签图文详情编辑
Route::get('/admin/kindergarten/label/details/text/update/{id}','AboutController@kindergarten_label_details_text_update')->where('id', '[0-9]+');
//do园所分部标签图文详情编辑
Route::post('/admin/kindergarten/label/details/text/doupdate/{id}','AboutController@kindergarten_label_details_text_doUpdate')->where('id', '[0-9]+');







/*********************************************************后台管理***************************************************/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
