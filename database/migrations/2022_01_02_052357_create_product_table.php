<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->string('id');
            $table->string('category_id');
            $table->string('slug');
            $table->string('name');
            $table->string('small_description');
            $table->longText('description');
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->string('image_price');
            $table->tinyInteger('status')->defaultValue('0');
            $table->tinyInteger('trending')->defaultValue('0');
            $table->string('meta_title');
            $table->string('meta_descrip');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('product');
    }
}
