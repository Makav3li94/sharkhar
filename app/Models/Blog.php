<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,\Spatie\Tags\HasTags,Number;

    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(BlogCategory::class);
    }

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->formatDifference());
	}
}
