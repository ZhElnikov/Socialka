<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	protected $fillable=[
		'user_id',
		'chat_id',
		'body',
		'showhide'
	];
	public function users(){
		return $this->belongsTo('App\User','user_id');
	}
}
