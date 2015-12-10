<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class Comment extends Migration {

    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id')->index();;

            $table->integer('comment_book_id')->unsigned();
            $table->foreign('comment_book_id')->references('book_id')->on('book')->onDelete('cascade');

            $table->integer('comment_user_id')->unsigned();
            $table->foreign('comment_user_id')->references('user_id')->on('user')->onDelete('cascade');

            $table->integer('comment_rating')->default(1);
            $table->string('comment_text', 256);
            $table->timestamp('created_at')->default(Carbon::now('Europe/Minsk'));
            $table->timestamp('updated_at')->default(Carbon::now('Europe/Minsk'));
            $table->engine = 'InnoDB';
        });
    }

    public function down() {
        Schema::drop('comment');
    }
}
