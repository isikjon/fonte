<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Puppy extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'breed',
        'gender',
        'color',
        'age',
        'coat',
        'status',
        'price',
        'description',
        'photo',
        'gallery',
        'is_new',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_new' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($puppy) {
            if (empty($puppy->slug)) {
                $puppy->slug = Str::slug($puppy->name) . '-' . uniqid();
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2, ',', ' ') . ' $';
    }
}
