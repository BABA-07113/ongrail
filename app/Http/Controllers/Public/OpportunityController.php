<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.opportunities.index', compact('opportunities'));
    }

    public function show($slug)
    {
        $opportunity = Opportunity::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.opportunities.show', compact('opportunity'));
    }

    public function type($type)
    {
        $opportunities = Opportunity::where('type', $type)
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.opportunities.index', compact('opportunities', 'type'));
    }

    public function apply(Request $request, Opportunity $opportunity)
    {
        $rules = [
            'applicant_name' => 'required|max:255',
            'applicant_email' => 'required|email|max:255',
            'applicant_phone' => 'nullable|max:50',
        ];

        if ($opportunity->has_form && $opportunity->form_schema) {
            foreach ($opportunity->form_schema as $field) {
                $rules['field_' . $field['name']] = $field['required'] ? 'required' : 'nullable';
            }
        }

        $validated = $request->validate($rules);

        $formData = null;
        if ($opportunity->has_form && $opportunity->form_schema) {
            $formData = [];
            foreach ($opportunity->form_schema as $field) {
                $key = 'field_' . $field['name'];
                $formData[$field['name']] = $validated[$key] ?? null;
            }
        }

        OpportunityApplication::create([
            'opportunity_id' => $opportunity->id,
            'applicant_name' => $validated['applicant_name'],
            'applicant_email' => $validated['applicant_email'],
            'applicant_phone' => $validated['applicant_phone'] ?? null,
            'form_data' => $formData,
        ]);

        return back()->with('success', 'Votre candidature a été soumise avec succès. Nous vous contacterons bientôt.');
    }
}
