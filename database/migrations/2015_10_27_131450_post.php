<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::drop('post');
    }
}
