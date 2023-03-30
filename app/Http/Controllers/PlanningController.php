<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\View\View;

class PlanningController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $firstDayOfWeek = Carbon::now()->setISODate($now->year, $now->weekOfYear);
        $lastDayOfWeek = Carbon::now()->setISODate($now->year, $now->weekOfYear, 7);
        $period = CarbonPeriod::create($firstDayOfWeek, $lastDayOfWeek);

        return view('planning.display',[
            'planning' => Planning::with('recipes')->where('year', '=', $now->year)->where('weeknumber', '=', $now->weekOfYear)->first(),
            'firstDayOfWeek' => $firstDayOfWeek,
            'lastDayOfWeek'=>$lastDayOfWeek,
            'period' => $period
        ]);
    }
    public function show(string $year, string $weeknumber):View
    {
        $firstDayOfWeek = Carbon::now()->setISODate($year, $weeknumber);
        $lastDayOfWeek = Carbon::now()->setISODate($year, $weeknumber, 7);
        $period = CarbonPeriod::create($firstDayOfWeek, $lastDayOfWeek);

        return view('planning.display', [
            'planning' => Planning::with('recipes')->where('year', '=', $year)->where('weeknumber', '=', $weeknumber)->first(),
            'firstDayOfWeek' => $firstDayOfWeek,
            'lastDayOfWeek'=>$lastDayOfWeek,
            'period' => $period
        ]);
    }
}
