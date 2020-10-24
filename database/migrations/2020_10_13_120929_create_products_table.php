<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('seller_id')->index();
            $table->unsignedBigInteger('insta_post_id')->unique()->index();
            $table->text('image')->nullable();
            $table->text('image_thumb')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('price')->nullable();
            $table->unsignedBigInteger('optional_price')->default(0)->nullable();
            $table->integer('like_count')->nullable();
            $table->integer('comment_count')->nullable();
            $table->integer('view_count')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0 for unavailable and 1 for available');
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
