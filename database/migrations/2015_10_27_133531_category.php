<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration{

    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->increments('category_id');
            $table->string('category_value', 64);
            $table->string('category_name', 64);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('category');
    }
}
