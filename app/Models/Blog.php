<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'photo',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title) . '-' . uniqid();
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public function getShortDescriptionAttribute(): string
    {
        return Str::limit(strip_tags($this->description), 150);
    }

    public function getProcessedContentAttribute(): string
    {
        if (!$this->content) {
            return '';
        }

        $content = $this->content;
        $pattern = '/\[BANNER:(\d+)\]/';
        
        return preg_replace_callback($pattern, function ($matches) {
            $bannerId = $matches[1];
            return view('partials.blog-banner', ['bannerId' => $bannerId])->render();
        }, $content);
    }
}

