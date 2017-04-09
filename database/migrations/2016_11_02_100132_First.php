<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class First extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create ('messages',function(Blueprint $t){
			$t->increments('id');
			$t->integer('user_id');
			$t->integer('chat_id');
			$t->text('body');
			$t->enum('showhile',array('show','hide'))->default('show');
			$t->timestamps();
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
