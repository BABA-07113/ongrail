<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->paginate(15);
        return view('admin.partenaires.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'nullable|max:255',
            'description' => 'nullable',
            'website_url' => 'nullable|max:255',
            'category' => 'required|in:financier,technique,institutionnel',
            'is_visible' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        Partner::create($data);
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire créé avec succès.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.form', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'nullable|max:255',
            'description' => 'nullable',
            'website_url' => 'nullable|max:255',
            'category' => 'required|in:financier,technique,institutionnel',
            'is_visible' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $partner->update($data);
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire mis à jour.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partenaires.index')->with('success', 'Partenaire supprimé.');
    }
}
