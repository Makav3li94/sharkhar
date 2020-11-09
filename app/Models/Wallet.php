<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];

	public function type(){
		return $this->belongsTo(WalletType::class);
	}

    public function seller(){
    	return $this->belongsTo(Seller::class);
    }

	public function buyer(){
		return $this->belongsTo(Buyer::class);
	}

	public function checkouts(){
    	return $this->hasMany(WalletCheckout::class);
	}
}
