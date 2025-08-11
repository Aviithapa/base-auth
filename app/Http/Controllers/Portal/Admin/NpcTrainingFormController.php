<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Exports\Admin\BulkTrainingApplicantsExport;
use App\Http\Controllers\Controller;
use App\Models\NpcTrainingForm;
use App\Models\NpcTrainingFormApplication;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NpcTrainingFormController extends Controller
{
    public function index()
    {
        $forms = NpcTrainingForm::with('creator')->withCount('trainingFormApplication')->latest()->get();
        return view('portal.pages.training-form.index', compact('forms'));
    }

    public function create()
    {
        return view('portal.pages.training-form.form');
    }

    public function show($id)
    {
        $trainingForm = NpcTrainingForm::with('creator')->findOrFail($id);
        return view('portal.pages.training-form.show', compact('trainingForm'));
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

    public function uploadDocument(Request $request, $id)
    {
        $request->validate([
            'document' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png|max:5120', // max 5MB
        ]);

        $form = NpcTrainingForm::findOrFail($id);

        $form->addMediaFromRequest('document')->toMediaCollection('training-documents');

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function deleteDocument(Media $media)
    {
        $media->delete();
        return back()->with('success', 'Document deleted successfully.');
    }

    public function approve($id)
    {
        $application = NpcTrainingFormApplication::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        return back()->with('success', 'Application approved successfully.');
    }

    public function reject($id)
    {
        $application = NpcTrainingFormApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return back()->with('error', 'Application rejected.');
    }

    public function exportApplicants($id)
    {
        $trainingForm = NpcTrainingForm::with('trainingFormApplication')->findOrFail($id);

        return Excel::download(new BulkTrainingApplicantsExport($trainingForm), 'training_applicants.xlsx');
    }
}
