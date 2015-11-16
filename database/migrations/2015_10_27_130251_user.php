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
            $table->integer('user_icq')->default(0);
            $table->string('user_skype')->default('');
            $table->string('user_about', 128)->default('');
            $table->string('remember_token', 128)->default('');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    public function down()
    {
        if (Schema::hasTable('user')) {
            Schema::drop('user');
        }

    }
}
