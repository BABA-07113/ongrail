<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
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
