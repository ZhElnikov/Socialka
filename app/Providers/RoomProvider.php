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
		if( (isset($_SERVER['REQUEST_URI']))){
			$url = $_SERVER['REQUEST_URI'];
			$arr_url = explode('/',$url);
			if ( $arr_url[1]=='room' ){
				$id = $arr_url[2];
				//Cookie::forget('rooms');
				if ( empty($_COOKIE["rooms"]) ){
					setcookie('rooms','1,',time()+3600*24,'/');
				}
				else{
					$flag=true;
					$arr=explode(',',$_COOKIE["rooms"]);
					foreach($arr as $one){
						if ($one == $id) $flag=false;
					}
					if ($flag){
						$new_cookie = $_COOKIE["rooms"].$id.',';
						setcookie('rooms',$new_cookie,time()+3600*24,'/');
					}
				}
			}
		  }
  //  setcookie('rooms','1,',time()+3600*24,'/');
  //   dd($_COOKIE["rooms"]);
    }

}
