<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
	        $table->id();
	        $table->unsignedBigInteger('shop_category_id')->default(0)->index();
	        $table->string('name');
	        $table->string('email')->nullable()->unique();
			$table->string('mobile')->unique();
			$table->string('m_code')->nullable()->unique();
			$table->text('address')->nullable();
			$table->string('sheba')->nullable()->unique();
			$table->string('insta_user')->unique();
			$table->tinyInteger('status')->nullable()->default(1)->comment('seller is active or deleted');
			$table->tinyInteger('is_verified')->nullable()->default(0);
			$table->tinyInteger('bank_status')->nullable()->default(0)->comment('direct or police payment');;
			$table->text('logo')->nullable();
			$table->text('bio')->nullable();
			$table->string('title')->nullable();
			$table->string('category')->nullable();
			$table->unsignedBigInteger('default_shipping')->nullable()->default(0);
			$table->unsignedBigInteger('free_shipping')->nullable()->default(0);
			$table->string('insta_link')->nullable();
			$table->bigInteger('telephone')->nullable();
			$table->unsignedInteger('posts')->nullable();
			$table->unsignedInteger('followers')->nullable();
			$table->unsignedInteger('following')->nullable();
	        $table->timestamp('email_verified_at')->nullable();
	        $table->string('password');
	        $table->text('id_card')->nullable();
	        $table->text('id_book')->nullable();
	        $table->text('id_bill')->nullable();

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
        Schema::dropIfExists('sellers');
    }
}
