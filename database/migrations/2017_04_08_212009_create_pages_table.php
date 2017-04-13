<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->text('page_content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        \App\Page::firstOrCreate([
            'title' => 'About Us',
            'url' => 'about-us'
        ]);
        \App\Page::firstOrCreate([
            'title' => 'Why Toy Trader?',
            'url' => 'why-toy-trader'
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
