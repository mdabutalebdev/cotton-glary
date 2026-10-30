<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'intro',
        'address',
        'phone',
        'email',
        'hours',
        'map_embed',
    ];

    public static function current(): ?self
    {
        return static::query()->first();
    }
}
