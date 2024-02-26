<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Teaching extends Model{
	protected $table = 'teaching_feature';
	protected $fillable = ['course_name_c','course_name_e','course_sort','course_cover_pic'];
	public $timestamps = true;
	protected function getDateFormat(){
		return time();
	}
	protected function asDateTime($val){
		return $val;
	}
}