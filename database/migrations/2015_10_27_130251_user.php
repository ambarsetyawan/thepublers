<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{

    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_firstname');
            $table->string('user_lastname');
            $table->string('user_email');
            $table->string('user_password');
            $table->string('user_cover_address');
            $table->integer('user_status');
            $table->dateTime('user_date_created');
        });
    }

    public function down()
    {
       Schema::drop('user');
    }
}
