<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Seller extends Authenticatable
{
    use HasFactory;
	protected $guarded = [];
	protected $hidden = [
		'password', 'remember_token',
	];
	public function orders(){
		return $this->hasMany(Order::class);
	}

	public function transactions(){
		return $this->hasMany(Transaction::class);
	}

	public function products(){
		return $this->hasMany(Product::class);
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

	public function getIsVerifiedAttribute( $value ) {
		if ($value  == 1 ) {
			return $value = 'green';
		} else {
			return $value = 'red';
		}
	}


	public function setMCodeAttribute($value) {
		if ( empty($value) ) { // will check for empty string
			$this->attributes['m_code'] = NULL;
		} else {
			$this->attributes['m_code'] = $value;
		}
	}


	public function setShebaAttribute($value) {
		if ( empty($value) ) { // will check for empty string
			$this->attributes['sheba'] = NULL;
		} else {
			$this->attributes['sheba'] = $value;
		}
	}

	public function setTelephoneAttribute($value) {
		if ( empty($value) ) { // will check for empty string
			$this->attributes['telephone'] = NULL;
		} else {
			$this->attributes['telephone'] = $value;
		}
	}
}
