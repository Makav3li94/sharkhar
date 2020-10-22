<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkLogin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function validFromToken($token){
	    return self::where('token', $token)
	               ->where('created_at', '>', Carbon::parse('-15 minutes'))
	               ->firstOrFail();
    }
}
