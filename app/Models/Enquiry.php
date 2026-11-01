<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'website',
        'service_id',
        'service_name',
        'target_publication',
        'budget_range',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(EnquiryNote::class)->latest();
    }

    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if ($status) {
            return $query->where('status', $status);
        }

        return $query;
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'new' => 'badge bg-primary text-white',
            'contacted' => 'badge bg-info text-dark',
            'in_progress' => 'badge bg-warning text-dark',
            'converted' => 'badge bg-success text-white',
            'closed' => 'badge bg-secondary text-white',
            default => 'badge bg-light text-dark',
        };
    }
}
