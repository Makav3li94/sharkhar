<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Buyer extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
	protected $hidden = [
		'password', 'remember_token',
	];
	protected $guard = 'buyer';
    public function orders(){
    	return $this->hasMany(Order::class);
    }

	public function transactions(){
		return $this->hasMany(Transaction::class);
	}

	public function feedbacks(){
		return $this->hasMany(Feedback::class);
	}

	public function police(){
		return $this->hasMany(Police::class);
	}

	public function setEmailAttribute($value) {
		if ( empty($value) ) { // will check for empty string
			$this->attributes['email'] = NULL;
		} else {
			$this->attributes['email'] = $value;
		}
	}
}
