<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('category_id');
	        $table->string('slug')->unique();
	        $table->string('title');
	        $table->string('image');
	        $table->string('meat');
	        $table->string('keywords');
            $table->text('body');
	        $table->foreign('category_id')->references('id')->on('blog_categories')->cascadeOnDelete();
            $table->timestamps();
            $table->date('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
