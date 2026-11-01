<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'section',
        'key',
        'value',
        'label',
        'type',
    ];

    public static function get(string $page, string $section, string $key, ?string $default = null): ?string
    {
        return Cache::rememberForever("page_content_{$page}_{$section}_{$key}", function () use ($page, $section, $key, $default) {
            $record = static::where('page', $page)
                ->where('section', $section)
                ->where('key', $key)
                ->first();

            return $record ? $record->value : $default;
        });
    }

    public static function set(string $page, string $section, string $key, ?string $value, ?string $label = null, string $type = 'text'): self
    {
        Cache::forget("page_content_{$page}_{$section}_{$key}");

        return static::updateOrCreate(
            [
                'page' => $page,
                'section' => $section,
                'key' => $key,
            ],
            [
                'value' => $value,
                'label' => $label ?? ucwords(str_replace('_', ' ', $key)),
                'type' => $type,
            ]
        );
    }
}
