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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_category_id');
            $table->string('name', 200);
            $table->string('url')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->string('image', 200);

            $table->string('p_highlight_heading')->nullable();
            $table->longText('p_highlights')->nullable();
            $table->string('p_description_heading')->nullable();
            $table->longText('p_description')->nullable();
            $table->string('p_details_heading')->nullable();
            $table->longText('p_details')->nullable();

            $table->string('sale_tag',50)->nullable();
            $table->integer('original_price')->nullable();
            $table->integer('offered_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('priority')->default('0');

            $table->tinyInteger('new_arrival_products')->default('0');
            $table->tinyInteger('featured_products')->default('0');
            $table->tinyInteger('popular_products')->default('0');
            $table->tinyInteger('offered_products')->default('0');
            $table->tinyInteger('status')->default('0');

            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keyword')->nullable();

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
        Schema::dropIfExists('products');
    }
}
