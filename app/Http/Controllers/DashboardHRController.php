<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class DashboardHRController extends Controller
{
    public function index(Request $request)
    {
        $faculty = Faculty::count();

        return view('dashboard.dashboard_hr', [
            'faculty' => $faculty,
        ]);
    }
}