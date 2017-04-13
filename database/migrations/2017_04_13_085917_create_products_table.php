<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('user_id')->unsigned()->default(0);
            $table->string('name');
            $table->float('price');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->boolean('is_enabled')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::update("ALTER TABLE products AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
