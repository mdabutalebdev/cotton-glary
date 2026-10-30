<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'link',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Public URL of the logo (spaces in the path are encoded).
     */
    public function imageUrl(): ?string
    {
        return $this->image ? asset(str_replace(' ', '%20', $this->image)) : null;
    }

    public static function activeOrdered()
    {
        return static::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get();
    }
}
