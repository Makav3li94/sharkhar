<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	use HasFactory,Number;
	protected $guarded = [];

	public function seller() {
		return $this->belongsTo( Seller::class );
	}

	public function product() {
		return $this->belongsTo( Product::class );
	}

	public function buyer() {
		return $this->belongsTo( Buyer::class );
	}

	public function transaction() {
		return $this->belongsTo( Transaction::class );
	}

	public function police() {
		return $this->hasOne( Police::class );
	}

	public function getDeliverStatusAttribute( $value ) {
		if ($value  == 1 ) {
			return $value = 'green';
		} else {
			return $value = 'red';
		}
	}

	public function getPaymentStatusAttribute( $value ) {

		if ( $value == 1 ) {
			return $value = 'green';
		} else {
			return $value = 'red';
		}
	}

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->format('%d %B ، %Y - H:i:s'));
	}
}
