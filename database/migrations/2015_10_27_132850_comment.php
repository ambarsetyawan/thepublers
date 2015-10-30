<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comment extends Migration {

    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('comment_post_id');
            $table->string('comment_author', 64);
            $table->string('comment_text', 256);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('comment');
    }
}
