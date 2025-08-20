<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Exports\Admin\BulkTrainingApplicantsExport;
use App\Http\Controllers\Controller;
use App\Models\NpcTrainingForm;
use App\Models\NpcTrainingFormApplication;
use App\Models\User;
use App\Notifications\Application\RejectApplicationNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

    public function show($id, Request $request)
{
    $status = $request->get('status', 'pending');

    // Load the form with its creator and applications
    $trainingForm = NpcTrainingForm::with('creator')->findOrFail($id);

    // Start query on applications
    $applicationsQuery = $trainingForm->trainingFormApplication();

    // Apply status filter if requested
    if ($status) {
        $applicationsQuery->where('npc_training_form_applications.status', $status);
    }

    // Get filtered applications
    $applications = $applicationsQuery->get();

    // Get counts for all statuses
    $counts = [
        'pending' => $trainingForm->trainingFormApplication()->where('status', 'pending')->count(),
        'approved' => $trainingForm->trainingFormApplication()->where('status', 'approved')->count(),
        'rejected' => $trainingForm->trainingFormApplication()->where('status', 'rejected')->count(),
    ];

    return view('portal.pages.training-form.show', compact('trainingForm', 'applications', 'counts', 'status'));
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

    public function reject(Request $request, $id)
    {
        $application = NpcTrainingFormApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->remarks = $request->input('remarks');
        $application->save();
        $user = User::findOrFail($application->user_id);

        $user->notify(new RejectApplicationNotification($user, $application->remarks));

        return redirect()->back()->with('error', 'Application rejected.');
    }

    public function exportApplicants($id)
    {
        $trainingForm = NpcTrainingForm::with('trainingFormApplication')->findOrFail($id);

        return Excel::download(new BulkTrainingApplicantsExport($trainingForm), 'training_applicants.xlsx');
    }

    public function downloadPdf($id, $user_id)
    {
        $trainingForm = NpcTrainingForm::findOrFail($id);

        $formApplication = NpcTrainingFormApplication::where('npc_training_form_id', $id)->where('user_id', $user_id)->firstOrFail();

        $pdf = Pdf::loadView('pdf.user-details', compact('trainingForm', 'formApplication'))->setPaper('a4', 'portrait');

        return $pdf->download('training-form-' . $id . '.pdf');
    }

    public function downloadCertificate($id, $user_id)
    {
        $trainingForm = NpcTrainingForm::findOrFail($id);

        $formApplication = NpcTrainingFormApplication::where('npc_training_form_id', $id)->where('user_id', $user_id)->firstOrFail();
        $url = url('http://tranning.nepalpharmacycouncil.com/');
        $qrCode = QrCode::size(100)->generate($url);
           $qrCodeBase64 = 'data:image/png;base64,' . base64_encode($qrCode);

        $pdf = Pdf::loadView('pdf.certificate', compact('trainingForm', 'formApplication', 'qrCodeBase64'))->setPaper('a4', 'landscape');

        return $pdf->download($formApplication->first_name . '-' . $trainingForm->name . '-certificate-' . $id . '.pdf');
    }

}
