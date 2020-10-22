<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->index();
            $table->unsignedBigInteger('user_id_id');
            $table->unsignedBigInteger('product_id');
            $table->text('buyer_body');
            $table->string('buyer_file');
            $table->text('seller_reply');
	        $table->string('seller_file');
	        $table->tinyInteger('admin_vote')->nullable()->comment('0 vote to buyer and 1 vote to seller');
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
        Schema::dropIfExists('police');
    }
}
