<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
	        $table->id();
	        $table->string('name')->nullable()->default('شرخریار ! :)');
	        $table->string('email')->unique()->nullable();
	        $table->string('mobile')->unique();
	        $table->tinyInteger('status')->default(1)->comment('buyer is active or deleted');
	        $table->text('address')->nullable();
	        $table->string('password');
	        $table->rememberToken();
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
        Schema::dropIfExists('buyers');
    }
}
