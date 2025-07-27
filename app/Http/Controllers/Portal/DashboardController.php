<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            return view('portal.dashbaord.default');
        } elseif (Auth::user()->hasRole('user')) {
            return view('portal.dashbaord.user');
        } else {
            return view('portal.dashbaord.default');
        }
    }
}
