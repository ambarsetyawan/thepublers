<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quotes extends Migration
{
    public function up()
    {
        Schema::create('quote', function (Blueprint $table) {
            $table->increments('quote_id');
            $table->string('quote_author', 32);
            $table->string('quote_text', 128);
        });
    }

    public function down()
    {
       Schema::drop('quote');
    }
}
