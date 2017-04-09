<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivteroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privterooms', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('reciever_id');
			$table->string('name');
			$table->enum('showhile',array('show','hide'))->default('show');
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
        Schema::drop('privterooms');
    }
}
