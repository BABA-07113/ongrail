<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'nullable|max:255',
            'function' => 'nullable|max:255',
            'content' => 'required',
            'type' => 'required|in:beneficiaire,formateur,partenaire',
            'is_approved' => 'nullable|boolean',
            'is_visible' => 'nullable|boolean',
        ]);

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage créé avec succès.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'nullable|max:255',
            'function' => 'nullable|max:255',
            'content' => 'required',
            'type' => 'required|in:beneficiaire,formateur,partenaire',
            'is_approved' => 'nullable|boolean',
            'is_visible' => 'nullable|boolean',
        ]);

        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage mis à jour.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage supprimé.');
    }
}
