<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletCheckout extends Model
{
    use HasFactory,Number;
	protected $guarded = [];

	public function wallet(){
		return $this->belongsTo(Wallet::class);
	}

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->format('y/n/j - H:i:s'));
	}
}
