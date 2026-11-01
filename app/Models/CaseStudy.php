<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'client_designation',
        'industry',
        'publication_name',
        'publication_url',
        'publication_badge',
        'campaign_objective',
        'challenge',
        'strategy',
        'execution',
        'results_metric',
        'results_summary',
        'metrics_breakdown',
        'featured_image',
        'gallery_images',
        'display_order',
        'is_published',
        'is_featured',
        'seo_title',
        'seo_description',
    ];

    protected function casts(): array
    {
        return [
            'metrics_breakdown' => 'array',
            'gallery_images' => 'array',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('display_order', 'asc')->orderBy('id', 'desc');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_published', true)->where('is_featured', true)->orderBy('display_order', 'asc');
    }
}
