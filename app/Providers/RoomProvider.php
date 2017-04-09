<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Cookie;

class RoomProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
	
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		$this->startcookie();
		$url = $_SERVER['REQUEST_URI'];
		$arr_url = explode('/',$url);
        if ( $arr_url[1]=='room' ){
			//$this->cookie($arr_url[2]);
		}
		
    }
	private function cookie($new_room){
		echo $new_room;
		
		$flag=true;
		$arr = explode(',',$_COOKIE['rooms']);
		foreach($arr as $one){
			if ($one == $new_room){
				$flag=false;
			}
		}
		echo $new_room;
		if ($flag){
			$arr[]=$new_room;
			$str = implode($arr);
			echo $str;
		}
	}
	private function startcookie(){
	//	if ( !isset(Cookie::get('rooms')) ){
			//setcockie('rooms','1,',time()+3600*24,'/'); //one day cookie
			Cookie::make('rooms','1,',3600);
			//echo Cookie::get('rooms');
			//echo $cookie;
			cookie('rooms');
		//}
	}
}
