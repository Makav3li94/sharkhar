<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
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


	public function police() {
		return $this->hasOne( Police::class );
	}

	public function getStatusAttribute( $value ) {

		if ( $value == 1 ) {
			return $value = 'green';
		} elseif($value == 0) {
			return $value = 'red';
		}else{
			return $value = 'info';
		}
	}
}
