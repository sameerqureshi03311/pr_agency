<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_designation',
        'client_company',
        'client_photo',
        'company_logo',
        'quote',
        'publication_featured_in',
        'rating',
        'display_order',
        'is_published',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('display_order', 'asc');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_published', true)->where('is_featured', true)->orderBy('display_order', 'asc');
    }
}
