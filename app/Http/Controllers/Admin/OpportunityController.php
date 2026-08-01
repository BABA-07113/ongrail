<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Models\OpportunityApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::latest()->paginate(15);
        return view('admin.opportunities.index', compact('opportunities'));
    }

    public function create()
    {
        return view('admin.opportunities.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'type' => 'required|in:appel_candidature,formation,stage,emploi,volontariat',
            'deadline' => 'nullable|date',
            'status' => 'required|in:ouvert,cloture,resultats_publies',
            'results_description' => 'nullable',
            'results_file' => 'nullable|max:255',
            'is_published' => 'nullable|boolean',
            'has_form' => 'nullable|boolean',
            'form_fields' => 'nullable|array',
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->boolean('is_published');
        $data['has_form'] = $request->boolean('has_form');

        if ($request->boolean('has_form') && $request->has('form_fields')) {
            $data['form_schema'] = $this->buildFormSchema($request->form_fields);
        }

        unset($data['form_fields']);
        Opportunity::create($data);

        return redirect()->route('admin.opportunites.index')->with('success', 'Opportunité créée avec succès.');
    }

    public function show(Opportunity $opportunity)
    {
        $applications = $opportunity->applications()->latest()->paginate(20);
        return view('admin.opportunities.show', compact('opportunity', 'applications'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('admin.opportunities.form', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'type' => 'required|in:appel_candidature,formation,stage,emploi,volontariat',
            'deadline' => 'nullable|date',
            'status' => 'required|in:ouvert,cloture,resultats_publies',
            'results_description' => 'nullable',
            'results_file' => 'nullable|max:255',
            'is_published' => 'nullable|boolean',
            'has_form' => 'nullable|boolean',
            'form_fields' => 'nullable|array',
        ]);

        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->boolean('is_published');
        $data['has_form'] = $request->boolean('has_form');

        if ($request->boolean('has_form') && $request->has('form_fields')) {
            $data['form_schema'] = $this->buildFormSchema($request->form_fields);
        } else {
            $data['form_schema'] = null;
        }

        unset($data['form_fields']);
        $opportunity->update($data);

        return redirect()->route('admin.opportunites.index')->with('success', 'Opportunité mise à jour.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return redirect()->route('admin.opportunites.index')->with('success', 'Opportunité supprimée.');
    }

    private function buildFormSchema(array $fields): array
    {
        $schema = [];
        foreach ($fields as $field) {
            if (empty($field['label'])) continue;
            $schema[] = [
                'name' => Str::slug($field['label']),
                'label' => $field['label'],
                'type' => $field['type'] ?? 'text',
                'required' => $field['required'] ?? false,
                'options' => $field['options'] ?? null,
                'placeholder' => $field['placeholder'] ?? '',
            ];
        }
        return $schema;
    }
}
