<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
	protected $fillable=[
		'user_id',
		'name',
		'roomtype',
		'reciever_id',
		'showhile'
	];
}
