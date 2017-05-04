<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
          $table->increments('id');
			    $table->integer('user_id');
			    $table->string('useravatar');
			    $table->string('username');
			    $table->string('usersurname');
			    $table->string('usercontact');
			    $table->text('userabout');
			    $table->text('usersex');
			    $table->integer('userchoose');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
