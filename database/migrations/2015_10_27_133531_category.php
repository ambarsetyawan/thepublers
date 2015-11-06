<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class Category extends Migration{

    public function up()
    {
        Schema::create('category', function(Blueprint $table){
            $table->increments('category_id');
            $table->string('category_value', 64);
            $table->string('category_name', 64);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::drop('category');
    }
}
