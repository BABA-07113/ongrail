<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected array $allowedKeys = [
        'site_name', 'site_description', 'site_logo', 'site_favicon',
        'contact_email', 'contact_phone', 'contact_phone_2', 'contact_address',
        'contact_map_lat', 'contact_map_lng',
        'social_facebook', 'social_twitter', 'social_linkedin',
        'social_instagram', 'social_youtube', 'social_whatsapp',
        'stat_projects', 'stat_beneficiaries', 'stat_partners', 'stat_years',
    ];

    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->only($this->allowedKeys) as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Paramètres mis à jour avec succès.');
    }

    public function profil()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.profil.index', compact('settings'));
    }

    public function updateProfil(Request $request)
    {
        return $this->update($request);
    }
}
