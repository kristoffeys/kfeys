<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_DRAFT = 'DRAFT';
    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_PUBLISHED, self::STATUS_DRAFT];

    public function scopePublished(Builder $query)
    {
        $query->where('status', self::STATUS_PUBLISHED);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public static function getFeedItems()
    {
        return static::published()
            ->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->excerpt)
            ->updated($this->updated_at)
            ->link('/posts/'.$this->slug)
            ->author('Kristof Feys');
    }
}
