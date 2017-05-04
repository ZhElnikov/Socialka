<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Room;
use App\Privteroom;
use App\Message;
use Auth;
use App\User;
use App\Profile;
use Cookie;
use App\Providers\RoomProvider;


class RoomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		if(!Auth::guest()){
					$user= User::find(Auth::user()->id);
		            dd($user->role->id);
		}
    }
    public function getIndex(){
		$title='Социалка - Комнаты';
		$rooms=Room::where('showhile','show')->where('roomtype','public')->orderBy('id','DESC')->get();
		$users=User::all();
		return view('rooms')->with('title',$title)->with('rooms',$rooms)->with('users',$users);
	}
	public function getNum($id=1){
		$title='Социалка';
		$room=Room::find($id);
		$messages=Message::where('chat_id',$id)->orderBy('id','DESC')->limit(40)->get();
    if( $room->roomtype == 'public'){
        $user=[];
		    foreach ($messages as $one){
			       $user[]=$one->user_id;
		    }
    }
    else{
      if( Auth::user()->id != $room->user_id && Auth::user()->id != $room->reciever_id){
        return redirect('/room/1');
      }
      $user=array($room->user_id, $room->reciever_id);
    }
    $unic_users=array_unique($user);
    $users=User::find($unic_users);
    $user=Auth::user();
    return view('thisroom')->with('room',$room)->with('id',$id)->with('title',$title)->with('messages',$messages)->with('users',$users)->with('user',$user);
	}
  public function closeRoom($thisid, $id){
    $arr_rooms=[];
    $incr=(int)0;
    $del_id=-1;
    if (isset($_COOKIE["rooms"])){
			$cookies=explode(',',$_COOKIE["rooms"]);
			foreach ($cookies as $one){
				$id_room = (int)$one;
        if ($id_room > 0)
        {
            if( $id_room == $id ) $del_id = $incr;
				    if( $id_room != $id ) $arr_rooms[]=Room::find($id_room);
            $incr++;
        }
			}

      unset($cookies[$del_id]);
    //sort($cookies);
      $new_cookie=implode(',',$cookies);
      setcookie('rooms',$new_cookie,time()+3600*24,'/');
		}
    return redirect('/room/'.$thisid)->with('arr_rooms',$arr_rooms)->with('thoose',$thisid);
    //return redirect('/room/'.$thisid);
  }
	public function postIndex(Requests\RoomRequest $r){
		$r['user_id']=Auth::user()->id;
		Room::create($r->all());
    $id=(Room::orderBy('id','DESC')->first())->id;
		return redirect('/room/'.$id);
	}
	public function postPrivateRoom($reciever_id){
    $reciever_name=( User::find($reciever_id) )->name;
    $r=array(
      'user_id' => Auth::user()->id,
      'reciever_id' => $reciever_id,
      'name' => $reciever_name.' and '.Auth::user()->name,
      'roomtype' => 'private',
    );
    Room::create( $r );
    $id=(Room::orderBy('id','DESC')->first())->id;
    return redirect('/room/'.$id);
	}
}
