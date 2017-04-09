<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Message;

class MessageController extends Controller
{
    //
	public function postIndex($id,Requests\MessageRequest $r){
		$r['user_id'] = Auth::user()->id;
		$r['chat_id'] = $id;
		message::create($r->all());
		return redirect('/room/'.$id);
	}
	public function getIndex(){
		
	}
}
