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
		$f=\App::make('App\Libs\Imag')->url($_FILES['useravatar1']['tmp_name'],'/media/photos/');
            $r['user_id']=Auth::User()->id;
		if ($f){
			$r['useravatar']=$f;		
	} 
		Profile::updateOrCreate([
			'user_id'=>Auth::user()->id
		],$r->all());
		return redirect('/profile');
	}
	public function index()
    {
		$all = Profile::where('user_id', Auth::Profile()->id)->orderBy('id','DESC')->paginate(10);
        return view('profile')->with('all',$all);
    }
}
