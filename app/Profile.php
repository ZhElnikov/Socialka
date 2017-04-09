<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
		'user_id',
		'useravatar',
		'username',
		'usersex',
		'usersurname',
		'usercontact',
		'userabout',
		'userchoose'
	];
	public function users(){
		return $this->belongsTo('App\User','user_id');
	}
}