<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanningController extends Controller
{
    public function index(){
        return view('planning.display',[
            'planning' => Planning::where('year', '=', Carbon::now()->year)->where('weeknumber', '=', Carbon::now()->weekOfYear)->first()
        ]);
    }
    public function show(string $year, string $weeknumber):View
    {
        $planning = Planning::where('year', '=', $year)->where('weeknumber', '=', $weeknumber)->first();
        return view('planning.display', [
            'planning' => $planning
        ]);
    }
}
