<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration{

    public function up()
    {
        Schema::create('post', function (Blueprint $table){
            $table->increments('post_id');
            $table->string('post_author', 64);
            $table->string('post_title', 128);
            $table->string('post_cover');
            $table->string('post_category', 32);
            $table->string('post_preview', 128);
            $table->text('post_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('post');
    }
}
