<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    protected $fillable = [
        'values_intro',
        'vision_intro',
        'pillars',
        'milestones',
        'stats',
    ];

    protected function casts(): array
    {
        return [
            'pillars' => 'array',
            'milestones' => 'array',
            'stats' => 'array',
        ];
    }

    public static function current(): ?self
    {
        return static::query()->first();
    }
}
