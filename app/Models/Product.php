<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	protected $guarded = [];

	public function seller() {
		return $this->belongsTo( Seller::class );
	}

//	public function getPriceAttribute($value)
//	{
//		return $value = $value." هزار تومان";
//	}
}
