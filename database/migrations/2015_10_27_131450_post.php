<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    public function up()
    {
        Schema::create('post', function (Blueprint $table){
            $table->integer('post_id');
            $table->string('post_author');
            $table->string('post_title');
            $table->string('post_cover');
            $table->string('post_category');
            $table->string('post_preview');
            $table->text('post_text');
            $table->dateTime('post_date_created');
        });
    }

    public function down()
    {
        Schema::drop('post');
    }
}
