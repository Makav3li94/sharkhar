<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
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

	public function order() {
		return $this->belongsTo( Order::class );
	}

	public function getScoreAttribute( $value ) {
		if ( $value == 0 ) {
			return 'red';
		} elseif ( $value == 1 ) {
			return 'warning';
		} else {
			return 'green';
		}
	}

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->format('y/n/j')) . " - " .$this->convertNumbers(Verta::instance($val)->formatDifference());
	}
	public function getUpdatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->format('y/n/j')) . " - " .$this->convertNumbers(Verta::instance($val)->formatDifference());
	}
}
