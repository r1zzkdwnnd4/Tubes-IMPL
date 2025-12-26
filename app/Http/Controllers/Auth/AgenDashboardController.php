<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenDashboardController extends Controller
{
    public function index()
    {
        $agen = Auth::guard('agen')->user();

        return view('pages.agenDashboard', [
            'agen' => $agen,
            'areaAgen' => $agen->Area
        ]);
    }
}
