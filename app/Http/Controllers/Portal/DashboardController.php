<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\NpcTrainingForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            $totalTraining = NpcTrainingForm::count(); // Example variable, replace with actual logic to get total training
            return view('portal.dashbaord.admin', compact('totalTraining'));
        } elseif (Auth::user()->hasRole('user')) {
            return view('portal.dashbaord.user');
        } else {
            return view('portal.dashbaord.default');
        }
    }
}
