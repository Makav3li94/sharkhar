<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('seller_id')->index();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id')->index();
            $table->string('transaction_id');
            $table->unsignedBigInteger('price');
            $table->tinyInteger('status')->default(0)->comment('is paid or not');
            $table->string('verify_code')->nullable();
            $table->tinyInteger('transaction_type')->comment('0 for police & 1 for direct');
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
        Schema::dropIfExists('transactions');
    }
}
