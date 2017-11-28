<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
