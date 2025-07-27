<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Http\Requests\NpcTrainingForm\StoreNpcTrainingFormRequest;
use App\Models\NpcTrainingForm;
use Illuminate\Http\Request;

class NpcTrainingFormController extends Controller
{
    // public function store(StoreNpcTrainingFormRequest $request)
    // {
    //     NpcTrainingForm::create($request->validated());

    //     return redirect()->back()->with('success', 'Form submitted successfully!');
    // }

    public function index()
    {
        $forms = NpcTrainingForm::with('creator')->latest()->get(); // eager-load creator (user)
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

        return redirect()->back()->with('success', 'Training form created successfully.');
    }
}
