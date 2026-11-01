<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'tagline',
        'short_description',
        'full_description',
        'features',
        'deliverables',
        'badge',
        'icon',
        'featured_image',
        'display_order',
        'is_active',
        'is_featured',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'deliverables' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('display_order', 'asc');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_active', true)->where('is_featured', true)->orderBy('display_order', 'asc');
    }

    public function enquiries(): HasMany
    {
        return $this->hasMany(Enquiry::class);
    }
}
