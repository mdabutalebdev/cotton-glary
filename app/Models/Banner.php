<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'badge_text',
        'title',
        'highlight_text',
        'description',
        'sub_description',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'background_image',
        'stats',
        'is_active',
        'sort_order',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stats' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Public URL of the background image (null when none is set).
     */
    public function backgroundUrl(): ?string
    {
        return $this->background_image ? asset($this->background_image) : null;
    }

    /**
     * The banner currently shown on the homepage hero.
     */
    public static function active(): ?self
    {
        return static::where('is_active', true)
            ->orderByDesc('updated_at')
            ->first();
    }
}
