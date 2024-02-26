<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class News extends Model{
	protected $table = 'anjila_news';
	protected $fillable = ['title_c','title_e','cover_pic','date_time','sort'];
	public $timestamps = true;
	protected function getDateFormat(){
		return time();
	}
	protected function asDateTime($val){
		return $val;
	}
}