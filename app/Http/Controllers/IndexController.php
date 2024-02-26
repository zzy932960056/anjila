<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Teaching;
use App\News;

class IndexController extends Controller
{   
	//安吉拉主页
    public function index(){
    	$data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','安吉拉首页')->get();
        $data['banner'] = $banner;
        //安吉拉文化
        $home_culture = DB::table('home_culture')->orderBy('id','asc')->get();
        $data['home_culture'] = $home_culture;
        //园所动态
        $news = DB::table('anjila_news')->limit(3)->orderBy('date_time','desc')->get();
        $data['news'] = $news;
        //首页底图
        $home_last_pic = DB::table('home_last_pic')->get();
        $data['home_last_pic'] = $home_last_pic;
        //园所分部首推
        $kindergarten_index = DB::table('kindergarten_index')
                        ->limit(1)
                        ->orderBy('id','asc')
                        ->where('is_first',1)->get();
        $data['kindergarten_index'] = $kindergarten_index;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        return view('qt_anjila_index',$data);
    }

    //安吉拉教学特色(亿童课程)
    public function teaching_yt(){
    	$data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','教学特色')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
    	//安吉拉教学特色(亿童课程)
        $teaching_yt = Teaching::where('course_sign','yt')->orderBy('id','asc')->paginate(4);
        $data['teaching_yt'] = $teaching_yt;
    	return view('qt_jiaoxuetese_yt_erji',$data);
    }

    //安吉拉教学特色(布朗课程)
    public function teaching_bl(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','教学特色')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //安吉拉教学特色(布朗课程)
        $teaching_bl = Teaching::where('course_sign','bl')->orderBy('id','asc')->paginate(4);
        $data['teaching_bl'] = $teaching_bl;
        return view('qt_jiaoxuetese_bl_erji',$data);
    }

    //安吉拉教学特色(艺术创想)
    public function teaching_ys(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','教学特色')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //安吉拉教学特色(艺术创想)
        $teaching_ys = Teaching::where('course_sign','ys')->orderBy('id','asc')->paginate(4);
        $data['teaching_ys'] = $teaching_ys;
        return view('qt_jiaoxuetese_ys_erji',$data);
    }

    //安吉拉教学特色(安吉拉早教)
    public function teaching_zj(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','教学特色')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //安吉拉教学特色(安吉拉早教)
        $teaching_zj = Teaching::where('course_sign','zj')->orderBy('id','asc')->paginate(4);
        $data['teaching_zj'] = $teaching_zj;
        return view('qt_jiaoxuetese_zj_erji',$data);
    }

    //安吉拉教学特色详情
    public function teaching_details($id){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','教学特色')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $teaching = DB::table('teaching_feature')->where('id',$id)->get();
        $data['teaching'] = $teaching;
        //标签
        $label = DB::table('teaching_feature_label')->where('feature_id',$id)->orderBy('id','asc')->get();
        $data['label'] = $label;
        //标签详情
        foreach($label as $k => $v){
            $label_details = DB::table('teaching_feature_label_index')
                                ->where('label_id',$v->id)
                                ->orderBy('id','asc')
                                ->get();
            $label[$k]->details = $label_details;
        }
        $data['label_details'] = $label;
        return view('qt_jiaoxuetese_sanji',$data);
    }

    //安吉拉文化
    public function culture(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','安吉拉文化')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //安吉拉教育理念
        $concept = DB::table('education_concept')->get();
        $data['concept'] = $concept;
        //安吉拉文化
        $culture = DB::table('culture_classify')->get();
        $data['culture'] = $culture;
        //安吉拉团队文本
        $team_intro = DB::table('team_intro')->get();
        $data['team_intro'] = $team_intro;
        //安吉拉团队教师
        $team_teacher = DB::table('team_teacher')->orderBy('id','asc')->get();
        $b = count($team_teacher);
        $arr = [];
        $j = 0;
        for($i=1;$i<=$b;$i++){
            $a = array_shift($team_teacher);
            $arr[$j][$i] = $a;
            if(is_int($i/4)){
                $j++;
            }
        }
        $data['team_teacher'] = $arr;
        //安吉拉说
        $speak = DB::table('education_speak')->get();
        $data['speak'] = $speak;
        return view('qt_anjilawenhua_erji',$data);
    }

    //安吉拉文化详情
    public function culture_details($id){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','安吉拉文化')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $culture = DB::table('culture_classify')->where('id',$id)->get();
        $data['culture'] = $culture;
        //标签
        $label = DB::table('culture_label')->where('culture_id',$id)->orderBy('id','asc')->get();
        $data['label'] = $label;
        //标签详情
        foreach($label as $k => $v){
            $label_details = DB::table('culture_label_index')
                                ->where('label_id',$v->id)
                                ->orderBy('id','asc')
                                ->get();
            $label[$k]->details = $label_details;
        }
        $data['label_details'] = $label;
        return view('qt_anjilawenhua_sanji',$data);
    }

    //园所动态二级(社会活动)
    public function news_sh(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','园所动态')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //园所动态二级(社会活动)
        $news_sh = News::where('sort','社会活动')->orderBy('id','asc')->paginate(4);
        $data['news_sh'] = $news_sh;
        return view('qt_yuansuodongtai_sh_erji',$data);
    }

    // //园所动态二级(节日活动)
    public function news_jr(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','园所动态')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //园所动态二级(节日活动)
        $news_jr = News::where('sort','节日活动')->orderBy('id','asc')->paginate(4);
        $data['news_jr'] = $news_jr;
        return view('qt_yuansuodongtai_jr_erji',$data);
    }

    //园所动态二级(班级活动)
    public function news_bj(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','园所动态')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //园所动态二级(班级活动)
        $news_bj = News::where('sort','班级活动')->orderBy('id','asc')->paginate(4);
        $data['news_bj'] = $news_bj;
        return view('qt_yuansuodongtai_bj_erji',$data);
    }

    //园所动态二级(父母沙龙)
    public function news_fm(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','园所动态')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //园所动态二级(父母沙龙)
        $news_fm = News::where('sort','父母沙龙')->orderBy('id','asc')->paginate(4);
        $data['news_fm'] = $news_fm;
        return view('qt_yuansuodongtai_fm_erji',$data);
    }

    //安吉拉教学特色三级
    public function news_details($id){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','园所动态')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $news = DB::table('anjila_news')->where('id',$id)->get();
        $data['news'] = $news;
        //详情
        $details = DB::table('anjila_news_details')->where('news_id',$id)->orderBy('id','asc')->get();
        $data['details'] = $details;
        return view('qt_yuansuodongtai_sanji',$data);
    }

    //常青藤课程
    public function curriculum(){
        $data = [];
        //banner
        $banner = DB::table('anjila_banner')->where('banner_sort','常青藤课程')->get();
        $data['banner'] = $banner;
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $curriculum1 = DB::table('curriculum_idea')->get();
        $data['curriculum1'] = $curriculum1;
        $curriculum2 = DB::table('curriculum_paragraph')->get();
        $data['curriculum2'] = $curriculum2;
        $curriculum3 = DB::table('consultative_course_text')->get();
        $data['curriculum3'] = $curriculum3;
        $curriculum4 = DB::table('consultative_course_paragraph')->get();
        $data['curriculum4'] = $curriculum4;
        $curriculum5 = DB::table('consultative_course_carousel')->get();
        $b = count($curriculum5);
        $arr = [];
        $j = 0;
        for($i=1;$i<=$b;$i++){
            $a = array_shift($curriculum5);
            $arr[$j][$i] = $a;
            if(is_int($i/3)){
                $j++;
            }
        }
        $data['curriculum5'] = $arr;
        return view('qt_changqingtengkecheng',$data);
    }
    //关于我们
    public function about(){
        $data = [];
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $about = DB::table('about_anjila')->get();
        $data['about'] = $about;
        $about_pic = DB::table('about_anjila_pic')->get();
        $data['about_pic'] = $about_pic;
        $history = DB::table('development_history_text')->get();
        $data['history'] = $history;
        $time = DB::table('development_timer_shaft')->get();
        $data['time'] = $time;
        $team_text = DB::table('manage_team_text')->get();
        $data['team_text'] = $team_text;
        $anjila_team = DB::table('anjila_team')->get();
        $data['anjila_team'] = $anjila_team;
        $kindergarten = DB::table('kindergarten_index')->orderBy('id','asc')->get();
        $b = count($kindergarten);
        $arr = [];
        $j = 0;
        for($i=1;$i<=$b;$i++){
            $a = array_shift($kindergarten);
            $arr[$j][$i] = $a;
            if(is_int($i/4)){
                $j++;
            }
        }
        $data['kindergarten'] = $arr;
        return view('qt_guanyuwomen',$data);
    }

    //园所分部详情
    public function about_details($id){
        $data = [];
        //底部信息
        $company_info = DB::table('company_info')->where('id',1)->get();
        $data['company_info'] = $company_info;
        //主体
        $kindergarten = DB::table('kindergarten_index')->where('id',$id)->get();
        $data['kindergarten'] = $kindergarten;
        //标签
        $label = DB::table('kindergarten_label')->where('kinder_id',$id)->orderBy('id','asc')->get();
        $data['label'] = $label;
        //标签详情
        foreach($label as $k => $v){
            $label_details = DB::table('kindergarten_label_index')
                                ->where('label_id',$v->id)
                                ->orderBy('id','asc')
                                ->get();
            $label[$k]->details = $label_details;
        }
        $data['label_details'] = $label;
        return view('qt_guanyuwomen_sanji',$data);
    }

}