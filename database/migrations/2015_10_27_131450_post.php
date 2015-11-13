<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class Post extends Migration{

    public function up()
    {
        Schema::create('book', function (Blueprint $table){
            $table->increments('book_id');
            $table->string('book_author', 64);
            $table->string('book_title', 128);
            $table->integer('book_year');
            $table->string('book_cover');
            $table->string('book_category', 32);
            $table->text('book_text');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::drop('book');
    }
}
