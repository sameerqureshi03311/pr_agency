@extends('layouts.admin')

@section('title', 'Website Settings')
@section('page_title', 'Agency & Global Configuration')

@section('content')

    <div class="mb-4">
        <h4 class="font-serif fs-4 mb-1">Global Website Settings</h4>
        <p class="text-muted small mb-0">Manage agency branding, corporate contact information, social links, and SEO defaults.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        @foreach($settings as $group => $items)
            <div class="admin-card mb-4">
                <div class="admin-card-header bg-light">
                    <h5 class="admin-card-title text-capitalize d-flex align-items-center gap-2">
                        <i class="bi bi-sliders text-warning"></i>
                        <span>Configuration Group: {{ $group }}</span>
                    </h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        @foreach($items as $setting)
                            <div class="{{ in_array($setting->type, ['textarea']) || strlen($setting->value) > 80 ? 'col-12' : 'col-md-6' }}">
                                <label for="setting_{{ $setting->key }}" class="form-label small fw-bold text-dark">
                                    {{ $setting->label ?: ucwords(str_replace('_', ' ', $setting->key)) }}
                                    <span class="text-muted fw-normal" style="font-size: 0.72rem;">({{ $setting->key }})</span>
                                </label>

                                @if($setting->type === 'textarea' || in_array($setting->key, ['footer_description', 'default_seo_description']))
                                    <textarea class="form-control" id="setting_{{ $setting->key }}" name="settings[{{ $setting->key }}]" rows="3">{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                @else
                                    <input type="{{ $setting->type === 'email' ? 'email' : ($setting->type === 'url' ? 'url' : 'text') }}" class="form-control" id="setting_{{ $setting->key }}" name="settings[{{ $setting->key }}]" value="{{ old('settings.' . $setting->key, $setting->value) }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="sticky-bottom bg-white p-3 border rounded shadow-sm d-flex justify-content-between align-items-center">
            <span class="text-muted small"><i class="bi bi-info-circle me-1"></i> Changes will immediately update global contact details and meta tags.</span>
            <button type="submit" class="btn btn-admin-gold px-4">
                <i class="bi bi-check2 me-1"></i> Save Website Settings
            </button>
        </div>
    </form>

@endsection
