<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;
use Illuminate\Support\Facades\DB;
use App\Measurement;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $chart = Charts::realtime(route('getjson'),15000, 'line', 'highcharts')
        ->title('Energy Consumption')
        ->colors(['#00ff00'])
        ->elementLabel("W")
        ->responsive(true)
        ->maxValues(10)
        ->valueName('power');

        return view('user/dashboard', ['chart' => $chart]);
    }

    public static function quarterWatts()
    {

      $quarters = DB::table('measurements')
                ->where(DB::raw("month(created_at)"),">=",date("m")-3)
                ->where('deviceID', Auth::user()->deviceID)
                ->pluck('power');
      $sum = 0;

      foreach($quarters as $quarter)
      {
        $sum = $sum + $quarter;//->power;
      }
      return $sum/340;// / 240;
    }

    public static function monthWatts()
    {
      $meas = DB::table('measurements')
                ->where(DB::raw("month(created_at)"),"=",date("m"))
                ->where('deviceID', Auth::user()->deviceID)
                ->pluck('power');
      $sum = 0;

      foreach($meas as $month)
      {
        $sum = $sum + $month;//->power;
      }
      return $sum/340;// / 240;
    }

    public static function dayWatts()
    {
      $meas = DB::table('measurements')
                ->where(DB::raw("dayofmonth(created_at)"),"=",date("j"))
                ->where('deviceID', Auth::user()->deviceID)
                ->pluck('power');
      $sum = 0;

      foreach($meas as $day)
      {
        $sum = $sum + $day;//->power;
      }
      return $sum/340;// / 240;
    }

    public static function yearWatts()
    {
      $meas = DB::table('measurements')
                ->where(DB::raw("year(created_at)"),"=",date("Y"))
                ->where('deviceID', Auth::user()->deviceID)
                ->pluck('power');
      $sum = 0;

      foreach($meas as $year)
      {
        $sum = $sum + $year;//->power;
      }
      return $sum/340;// / 240;
    }
}
