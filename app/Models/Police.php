<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police extends Model {
	use HasFactory;
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

	public function order() {
		return $this->belongsTo( Order::class );
	}
	public function transaction() {
		return $this->belongsTo( Transaction::class );
	}

	public function getIsVerifiedAttribute( $value ) {
		if ($value  == 1 ) {
			return $value = 'blue';
		} elseif($value == 2) {
			return $value = 'green';
		}else{
			return $value = 'red';
		}
	}
}
