<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'eyebrow',
        'name',
        'designation',
        'paragraph_1',
        'paragraph_2',
        'phone',
        'email',
        'image',
    ];

    public function imageUrl(): ?string
    {
        return $this->image ? asset($this->image) : null;
    }

    /**
     * The single owner/founder profile row (null if not created yet).
     */
    public static function current(): ?self
    {
        return static::query()->first();
    }
}
