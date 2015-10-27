<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->integer('category_id');
            $table->string('category_value');
            $table->string('category_name');
        });
    }

    public function down()
    {
        Schema::drop('category');
    }
}
