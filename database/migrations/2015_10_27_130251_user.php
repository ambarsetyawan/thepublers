<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class User extends Migration{

    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id')->unsigned()->index();
            $table->string('user_firstname', 32);
            $table->string('user_lastname', 32);
            $table->string('user_email', 32)->unique();
            $table->string('user_password', 128);
            $table->string('user_cover_address');
            $table->integer('user_status')->default(0);
            $table->integer('user_icq')->default(0);
            $table->string('user_skype')->default('');
            $table->string('user_about', 128)->default('');
            $table->string('remember_token', 128)->default('');
            $table->timestamp('created_at')->default(Carbon::now('Europe/Minsk'));
            $table->timestamp('updated_at')->default(Carbon::now('Europe/Minsk'));
            $table->engine = 'InnoDB';

        });
    }

    public function down()
    {
        if (Schema::hasTable('user')) {
            Schema::drop('user');
        }

    }
}
