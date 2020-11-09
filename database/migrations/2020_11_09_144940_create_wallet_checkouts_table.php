<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_checkouts', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('wallet_id')->nullable();
	        $table->unsignedBigInteger('transaction_id');
	        $table->tinyInteger('transaction_type')->nullable()->default(1)->comment('0 for decrement and 1 for increment');
	        $table->string('amount')->default(0);
	        $table->string('running_raw_balance')->default(0);
	        $table->tinyInteger('status')->nullable()->default(0)->comment('0 for in proccess & 1 for Done');
	        $table->timestamps();

	        $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_checkouts');
    }
}
