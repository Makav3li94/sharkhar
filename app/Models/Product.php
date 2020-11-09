<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Product extends Model implements Feedable
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
	public function toFeedItem(): FeedItem
	{
		return FeedItem::create([
			'id' => $this->id,
			'title' => $this->title,
			'summary' => Str::limit($this->title,100),
			'updated' => $this->updated_at,
			'link' => route('product',$this->id),
			'author' => $this->seller->insta_user,
		]);
	}
	public static function getFeedItems()
	{
		return Product::all();
	}
}
