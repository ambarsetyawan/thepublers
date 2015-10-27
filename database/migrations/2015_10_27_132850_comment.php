<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comment extends Migration {
    public function up() {
        Schema::create('comment', function (Blueprint $table) {
            $table->integer('comment_id');
            $table->integer('comment_post_id');
            $table->string('comment_author');
            $table->string('comment_text');
            $table->dateTime('comment_date_created');
        });

    }

    public function down() {
        Schema::drop('comment');
    }
}
