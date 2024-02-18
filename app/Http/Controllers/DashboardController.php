<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $faculty = Faculty::count();
        return view('dashboard.dashboard', [
            'faculty' => $faculty,
        ]);
    }
    

}
