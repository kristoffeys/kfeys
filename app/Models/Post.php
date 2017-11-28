<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const STATUS_PUBLISHED = 'PUBLISHED';
    const STATUS_DRAFT = 'DRAFT';
    /**
     * List of statuses.
     *
     * @var array
     */
    public static $statuses = [self::STATUS_PUBLISHED, self::STATUS_DRAFT];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
