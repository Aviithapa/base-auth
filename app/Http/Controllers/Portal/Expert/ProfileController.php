<?php

namespace App\Http\Controllers\Portal\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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
        $profile = $this->user->profile;
        return view('portal.user.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $this->user->update($request->only('name', 'email'));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('changePassword', 'Current password is incorrect.');
        }

        auth()
            ->user()
            ->update([
                'password' => Hash::make($request->password),
            ]);

        return back()->with('success', 'Password changed successfully.');
    }

    public function updateProfile(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'citizenship_number' => 'nullable|string|max:255',
            'issued_district' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:20',
            'qualification' => 'nullable|string|max:255',
            'institution_attended' => 'nullable|string|max:255',
            'graduation_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'workplace_name' => 'nullable|string|max:255',
            'workplace_address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'roles' => 'nullable|string|max:255',
        ]);

        // Get the authenticated user profile
        $profile = $this->user->profile;
        $profile->fill($validated);
        $profile->user_id = Auth::id();
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
