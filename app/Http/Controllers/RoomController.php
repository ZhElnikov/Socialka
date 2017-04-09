<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;
use App\Privateroom;
use App\Message;
use Auth;
use App\User;
use App\Profile;
use Cookie;


class RoomController extends Controller
{
    public function __construct()
    {
 

        $this->middleware('auth');
		if(!Auth::guest()){
					$user= User::find(Auth::user()->id);
		            dd($user->role->id);
		}

    }  
    public function getIndex(){   
		$title='Социалка - Комнаты';
		$rooms=Room::where('showhile','show')->orderBy('id','DESC')->get();
		$users=User::all();
		return view('rooms')->with('title',$title)->with('rooms',$rooms)->with('users',$users);
	}
	public function getNum($id=1){
		$title='Социалка';
		$room=Room::find($id);
		$messages=Message::where('chat_id',$id)->orderBy('id','DESC')->limit(40)->get();
		
		
		$user=[];
		foreach ($messages as $one){
			$user[]=$one->user_id;
		}
		$unic_users=array_unique($user);
		$users=User::find($unic_users);
		//echo( serialize($_COOKIE['rooms']) );
		//$this->getCookie($id);
		return view('thisroom')->with('room',$room)->with('id',$id)->with('title',$title)->with('messages',$messages)->with('users',$users);
	}
	public function getMain(){
		$title='Социалка';
		$r=Auth::user();
		//$id=$r->profiles->userchoose;
		return redirect('/room/1');
		///'.$id);
	}
	public function postIndex(Requests\RoomRequest $r){
		$r['user_id']=Auth::user()->id;
		Room::create($r->all());
		return redirect('/rooms');
	}
	public function postPrivateRoom($reciever_id){
		//Requests\PrivateroomRequest $r;
		$r['user_id']=Auth::user()->id;
		$r['reciever_id']=$reciever_id;
		Privateroom::create($r->all());
		return redirect('/');
	}
	public function getCookie($id=null){
		//$arr = explode(serialize($_COOKIE['rooms']),';');
		$arr = explode($_COOKIE['rooms'],',');
		echo $arr;
		$arr_cookie = [];
		foreach ($arr as $key=>$value){
			$arr_cookie[]=$key;
		}
		$arr_cookie[]=$id;
		$new_cookie = implode($arr_cookie,',');
		Cookie::make('rooms',$new_cookie);
	}
}
