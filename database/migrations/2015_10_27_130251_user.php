<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration{

    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_firstname', 32);
            $table->string('user_lastname', 32);
            $table->string('user_email', 32)->unique();
            $table->string('user_password', 32);
            $table->string('user_cover_address');
            $table->integer('user_status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        if (Schema::hasTable('user')) {
            Schema::drop('user');
        }

    }
}
