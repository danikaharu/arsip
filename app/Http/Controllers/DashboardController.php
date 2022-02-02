<?php

namespace App\Http\Controllers;

use App\Models\Cup;
use App\Models\Gallon;
use App\Models\Logistic;
use App\Models\QualityControl;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $role = Auth::user()->role;
        $totalLogistic = Logistic::all()->count();
        $totalProductionGallon = Gallon::all()->count();
        $totalProductionCup = Cup::all()->count();
        $totalQualityControl = QualityControl::all()->count();

        if ($role == '1') {
            return view('dashboard', compact('totalLogistic', 'totalProductionGallon', 'totalProductionCup'));
        } elseif ($role == '0') {
            return view('maintenance.dashboard', ['totalQualityControl' => $totalQualityControl]);
        } else {
            return view('director.dashboard', compact('totalLogistic', 'totalProductionGallon', 'totalProductionCup', 'totalQualityControl'));
        }
    }
}
