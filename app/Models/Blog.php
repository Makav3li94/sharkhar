<?php

namespace App\Models;

use App\Traits\Number;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Blog extends Model implements Feedable
{
    use HasFactory,\Spatie\Tags\HasTags,Number;
	protected $dateFormat = 'Y-m-d H:i';
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(BlogCategory::class);
    }

	public function getCreatedAtAttribute($val)
	{
		return $this->convertNumbers(Verta::instance($val)->formatDifference());
	}


	public function toFeedItem(): FeedItem
	{
		return FeedItem::create([
			'id' => $this->id,
			'title' => $this->title,
			'summary' => $this->meta,
			'updated' => $this->updated_at,
			'link' => route('blog',$this->slug),
			'author' => 'parham akbari',
		]);
	}
	public static function getFeedItems()
	{
		return Blog::all();
	}
}
