<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory,Number;
    protected  $guarded = [];
    protected $table = 'contacts';

    public function seller(){
    	return $this->belongsTo(Seller::class);
    }

	public function buyer(){
		return $this->belongsTo(Buyer::class);
	}

	public function getStatusAttribute($value){
		if ($value == 0){
			return 'info';
		}elseif($value == 1){
			return 'success';
		}else{
			return 'secondary';
		}
	}

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->formatDifference());
	}
	public function getUpdatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->formatDifference());
	}
}
