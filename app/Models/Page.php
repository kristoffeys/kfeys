<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Page extends Model
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_ACTIVE, self::STATUS_INACTIVE];

    public function getBodyAttribute($original)
    {
        return (new Parsedown())->text($original);
    }

    public function getMarkdownAttribute()
    {
        return $this->getOriginal('body');
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
