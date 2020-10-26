<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->index();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('product_id');
	        $table->unsignedBigInteger('price');
	        $table->unsignedBigInteger('discount')->nullable()->default(0);
	        $table->unsignedBigInteger('shipping_cost')->nullable()->default(0);
	        $table->unsignedInteger('qty')->default(1);
	        $table->text('note')->nullable();
	        $table->tinyInteger('deliver_status')->default(0)->comment('is deliverd or not');
	        $table->tinyInteger('payment_status')->default(0)->comment('is paid or not');
	        $table->tinyInteger('payment_method')->default(1)->comment('1 for direct and 0 for police');
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
        Schema::dropIfExists('orders');
    }
}
