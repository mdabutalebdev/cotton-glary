<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about_sections';

    protected $fillable = [
        'eyebrow',
        'title',
        'paragraph_1',
        'paragraph_2',
        'button_text',
        'button_link',
        'image',
        'progress_title',
        'progress_stats',
    ];

    protected function casts(): array
    {
        return [
            'progress_stats' => 'array',
        ];
    }

    public function imageUrl(): ?string
    {
        return $this->image ? asset($this->image) : null;
    }

    /**
     * The single About section row (null if not created yet).
     */
    public static function current(): ?self
    {
        return static::query()->first();
    }
}
