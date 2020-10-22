<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('contacts', function (Blueprint $table) {
		    $table->id();
		    $table->unsignedBigInteger('parent_id')->nullable()->default(0);
		    $table->string('email')->nullable();
		    $table->string('mobile')->nullable();
		    $table->unsignedBigInteger('admin_id')->nullable()->default(0);
		    $table->unsignedBigInteger('seller_id')->nullable()->default(0);
		    $table->unsignedBigInteger('buyer_id')->nullable()->default(0);
		    $table->string('subject')->nullable();
		    $table->text('body');
		    $table->text('reply')->nullable();
		    $table->tinyInteger('status')->nullable()->default(0)->comment('0 for not answerd. 1 for answerd 2 for closed');

		    $table->timestamps();
	    });
    }


    public function down()
    {
	    Schema::dropIfExists('contacts');
    }
}
