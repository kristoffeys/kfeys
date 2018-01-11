<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Parsedown;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;


class Post extends Model implements Feedable
{
    use FormAccessible;

    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_DRAFT = 'DRAFT';
    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_PUBLISHED,self::STATUS_DRAFT];
    public static $statusdropdown = [
        self::STATUS_DRAFT => 'Draft',
        self::STATUS_PUBLISHED => 'Published',
    ];

    public function scopePublished(Builder $query)
    {
        $query->where('status', self::STATUS_PUBLISHED);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function getBodyAttribute($original)
    {
        return (new Parsedown())->text($original);
    }

    public function getMarkdownAttribute()
    {
        return $this->getOriginal('body');
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

    public function updateAttributes(array $attributes)
    {
        $this->title = $attributes['title'];
        $this->body = $attributes['markdown'];
        $this->excerpt = $attributes['excerpt'];
        $this->meta_description = $attributes['meta_description'] ?? $attributes['excerpt'];
        $this->meta_keywords = $attributes['meta_keywords'] ?? '';
        $this->status = $attributes['status'];

        $this->save();
        return $this;
    }
}
