<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\NpcTrainingFormApplication;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = NpcTrainingFormApplication::with('creator', 'npcTrainingForm')->latest()->get();
        return view('portal.pages.application.index', compact('forms'));
    }

}
