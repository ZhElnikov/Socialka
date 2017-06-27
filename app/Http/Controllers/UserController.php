<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Profile;
use App\Friend;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function getIndex($id){
		$title='Профиль';
		$user=User::where('id',$id)->first();
		$me=Auth::user();
		return view('userprofile')->with('title',$title)->with('id',$id)->with('user',$user)->with('me',$me);
	}
	public function getUsers(){
		$title='Пользователи';
		$flag='users';
		$users=User::all();
		return view('users')->with('title',$title)->with('users',$users)->with('flag',$flag);
	}
	public function getFriends(){
		$title='Друзья';
		$flag='friends';
		$friends_id=Friend::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
		return view('users')->with('title',$title)->with('friends',$friends_id)->with('flag',$flag);
	}
  public function addfriend($friend_id){
    $r=array(
      'user_id' => Auth::user()->id,
      'friend_user_id' => $friend_id,
    );
    Friend::create($r);
    return redirect('/user/'.$friend_id);
  }
	public function logout(){
		Auth::logout();
		return redirect(route('login'));
	}
}
