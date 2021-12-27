<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use App\Models\Production;
use App\Models\QualityControl;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $role = Auth::user()->role;
        $totalLogistic = Logistic::all()->count();
        $totalProduction = Production::all()->count();
        $totalQualityControl = QualityControl::all()->count();

        if ($role == '1') {
            return view('dashboard', compact('totalLogistic', 'totalProduction'));
        } else {
            return view('maintenance.dashboard', ['totalQualityControl' => $totalQualityControl]);
        }
    }
}
