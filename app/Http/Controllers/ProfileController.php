<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;
use Auth;
use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }  
	public function getIndex(){  
		$title='Социалка';
		$user=Profile::where('user_id',Auth::user()->id)->first();
		if($user == null){
			$user = new Profile;
		}
		return view('profile')->with('title',$title)->with('user',$user);
	}
	public function postIndex(Requests\UserRequest $r){  
		Profile::updateOrCreate([
			'user_id'=>Auth::user()->id
		],$r->all());
		return redirect('/profile');
	}
}
