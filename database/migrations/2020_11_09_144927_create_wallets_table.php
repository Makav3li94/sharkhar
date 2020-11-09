<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->nullable()->default(0)->index();
            $table->unsignedBigInteger('buyer_id')->nullable()->default(0)->index();
            $table->unsignedBigInteger('wallet_type_id')->nullable();
	        $table->string('raw_balance')->default(0);
            $table->timestamps();

	        $table->foreign('wallet_type_id')->references('id')->on('wallet_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
