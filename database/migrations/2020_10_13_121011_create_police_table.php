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
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('transaction_type');

            $table->tinyInteger('is_verified')->default(1)->comment('1 for natural 2 for verifie and 0 for fuck up shit ');
            $table->text('buyer_body')->nullable();
            $table->string('buyer_file')->nullable();
            $table->text('seller_reply')->nullable();
	        $table->string('seller_file')->nullable();
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
