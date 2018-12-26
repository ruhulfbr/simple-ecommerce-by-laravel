<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->longtext('product_short_desc');
            $table->longtext('product_long_desc');
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_color');
            $table->string('product_size');
            $table->integer('product_status');
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
        Schema::dropIfExists('tb_products');
    }
}
