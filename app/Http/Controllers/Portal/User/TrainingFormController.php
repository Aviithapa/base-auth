<?php

namespace App\Http\Controllers\Portal\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\NpcTrainingForm\StoreNpcTrainingFormRequest;
use App\Http\Requests\NpcTrainingForm\UpdateNpcTrainingFormRequest;
use App\Models\NpcTrainingForm;
use App\Models\NpcTrainingFormApplication;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TrainingFormController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $forms = NpcTrainingForm::with([
            'creator',
            'trainingFormApplication' => function ($q) {
                $q->where('user_id', Auth::id());
            },
        ])
            ->latest()
            ->get();

        return view('portal.user.training-form.index', compact('forms'));
    }

    /**
     * Create a new resource in storage.
     *
     * @param StoreNpcTrainingFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNpcTrainingFormRequest $request)
    {
        try {
            $data = $request->validated();

            if (!$this->user->profile) {
                $userData = collect($request->validated())
                    ->except(['declaration_date', 'declaration_place'])
                    ->toArray();
                $this->user->profile()->create($userData);
            }

            $form = NpcTrainingFormApplication::create($data);

            if ($request->hasFile('profile_photo')) {
                $form->addMediaFromRequest('profile_photo')->toMediaCollection('profile_photo');
            }

            if ($request->hasFile('certificate_front')) {
                $form->addMediaFromRequest('certificate_front')->toMediaCollection('certificate_front');
            }

            return redirect()->route('user.training-form.index')->with('success', 'Training form created successfully.');
        } catch (Exception $e) {
            Log::error('Training form store failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'data' => $request->all(),
            ]);
            return redirect()->back()->withInput()->withErrors('Something went wrong. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        $trainingForm = NpcTrainingForm::findOrFail($id);
        $profile = $this->user->profile;
        $formApplication = NpcTrainingFormApplication::where('npc_training_form_id', $id)->where('user_id', $this->user->id)->first();
        return view('portal.user.training-form.show', compact('trainingForm', 'profile', 'formApplication'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function apply($id): View
    {
        $trainingForm = NpcTrainingForm::findOrFail($id);
        $profile = $this->user->profile;
        $formApplication = NpcTrainingFormApplication::where('npc_training_form_id', $id)->where('user_id', $this->user->id)->first();

        return view('portal.user.training-form.apply', compact('trainingForm', 'profile', 'formApplication'));
    }

    public function update($id, UpdateNpcTrainingFormRequest $request)
    {
        try {
            $data = $request->validated();

            $form = NpcTrainingFormApplication::findOrFail($id);
            $form->update($data);

            if ($request->hasFile('profile_photo')) {
                $form->clearMediaCollection('profile_photo');
                $form->addMediaFromRequest('profile_photo')->toMediaCollection('profile_photo');
            }

            if ($request->hasFile('certificate_front')) {
                $form->clearMediaCollection('certificate_front');
                $form->addMediaFromRequest('certificate_front')->toMediaCollection('certificate_front');
            }

            return redirect()->route('user.training-form.index')->with('success', 'Training form updated successfully.');
        } catch (Exception $e) {
            Log::error('Training form update failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'data' => $request->all(),
            ]);
            return redirect()->back()->withInput()->withErrors('Something went wrong. Please try again.');
        }
    }
}
