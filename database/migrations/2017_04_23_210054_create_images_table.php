<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('images')) {
            return;
        }
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->morphs('imageable');
            $table->string('name');
            $table->string('path');
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('images', function (Blueprint $table) {
            $table->drop('images');
        });
    }
}
