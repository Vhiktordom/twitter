<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\softDeletes;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    use SoftDeletes;

    protected $fillable = [
    	'user_id', 'content', 'live', 'post_on'
    ];

    protected $dates = ['post_on', 'deleted_at'];

    public function setLiveAttribute($value){
    	$this->attributes['live'] = (boolean)($value);
    }

    public function getShortContentAttribute(){
    	return substr($this->content, 0, random_int(60,150)) . '...';
    }

    public function setPostOnAttribute($value)
    {
    	$this->attributes['post_on'] = Carbon::parse($value);
    }

  public function user(){

  	//return User::where('id', $this->user_id)->first()->name;

  	return $this->belongsTo('App\User');

  }
}
