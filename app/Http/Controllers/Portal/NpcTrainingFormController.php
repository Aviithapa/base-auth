<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\NpcTrainingForm;
use Illuminate\Http\Request;

class NpcTrainingFormController extends Controller
{
    public function index()
    {
        $forms = NpcTrainingForm::with('creator')->latest()->get();
        return view('portal.pages.training-form.index', compact('forms'));
    }

    public function create()
    {
        return view('portal.pages.training-form.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'training_start_date' => 'required|date',
            'form_end_date' => 'required|date',
            'description' => 'nullable|string',
        ]);
        NpcTrainingForm::create($data);
        return redirect()->route('training-form.index')->with('success', 'Training form created successfully.');
    }

    public function edit($id)
    {
        $trainingForm = NpcTrainingForm::findOrFail($id);
        return view('portal.pages.training-form.edit', compact('trainingForm'));
    }

    public function update(Request $request, NpcTrainingForm $trainingForm)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'training_start_date' => ['required', 'date'],
            'form_end_date' => ['required', 'date', 'after_or_equal:training_start_date'],
            'description' => ['nullable', 'string'],
        ]);
        $trainingForm->update($validated);
        return redirect()->route('training-form.index')->with('success', 'Training form updated successfully.');
    }

    public function destroy(NpcTrainingForm $trainingForm)
    {
        $trainingForm->delete();
        return redirect()->route('training-form.index')->with('success', 'Training form deleted successfully.');
    }
}
