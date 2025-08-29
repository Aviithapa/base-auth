<?php

namespace App\Http\Controllers\Portal\Expert;

use App\Http\Controllers\Controller;
use App\Http\Requests\Expert\StoreExpertRequest;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $expert = $user->expert;
        return view('portal.expert.details.index', compact('expert'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreExpertRequest $request)
{
    try {
        $validated = $request->validated();
        $user = Auth::user();

        if ($user->expert) {
            $user->expert->update($validated);
            $message = 'Expert profile updated successfully!';
        } else {
            $user->expert()->create($validated);
            $message = 'Expert profile created successfully!';
        }

        return redirect()->route('expert.expert.index')->with('success', $message);
    } catch (\Throwable $e) {
        // Log the error for debugging
        \Log::error('Error storing expert profile', [
            'user_id' => Auth::id(),
            'error'   => $e->getMessage(),
            'trace'   => $e->getTraceAsString(),
        ]);
        dd($e);

        // Redirect back with error
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Something went wrong while saving the expert profile. Please try again.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
