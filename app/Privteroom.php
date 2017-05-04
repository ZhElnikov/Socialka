<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privteroom extends Model
{
    //
    protected $fillable=[
  		'user_id',
      'reciever_id',
  		'name',
  		'showhile'
  	];
}
