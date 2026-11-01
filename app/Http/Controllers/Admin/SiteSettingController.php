<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::all()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $settingsInput = $request->input('settings', []);

        foreach ($settingsInput as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();
            if ($setting) {
                SiteSetting::set($key, $value, $setting->group, $setting->label, $setting->type);
            }
        }

        return back()->with('success', 'Website settings updated successfully.');
    }
}
