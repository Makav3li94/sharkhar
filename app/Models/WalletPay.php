<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletPay extends Model {
	use HasFactory;
	protected $guarded = [];

	public function wallet() {
		return $this->belongsTo( Wallet::class );
	}
}
