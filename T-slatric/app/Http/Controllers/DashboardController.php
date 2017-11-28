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
        // $chart = Charts::database(Measurement::all(), 'area', 'highcharts')
        // ->title('Energy consumption')
        // ->elementLabel("Total")
        // ->dimensions(1000, 500)
        // ->responsive(true)
        // ->groupBy('user_id');

        // $chart = Charts::multi('areaspline', 'highcharts')
        // ->title('Energy consumption')
        // ->colors(['#00ff00'])
        // ->elementLabel("kw/h")
        // ->dimensions(1000, 500)
        // //->interval(1000)
        // ->responsive(true);
        // $meas = DB::table('measurements')->where('deviceID', Auth::user()->deviceID)->pluck('power');
        //
        // $m_array = [];
        // foreach ($meas as $mea)
        // {
        //   array_push($m_array, $mea);
        //   //echo $mea;
        //   //echo "<br>";
        // }
        // $chart->dataset('Power', $m_array);

        $chart = Charts::realtime(route('getjson'),15000, 'line', 'highcharts')
        ->title('Energy Consumption')
        ->colors(['#00ff00'])
        ->elementLabel("W")
        // ->dimensions(1000, 500)
        ->responsive(true)
        ->maxValues(10)
        ->valueName('power');


        //return view('test', ['chart' => $chart]);
        return view('user/dashboard', ['chart' => $chart]);
    }

    public static function quarterWatts()
    {
      if((date("m") == 02) || (date("m") == 06) || (date("m") == 10))
      {
        $quarters = DB::table('measurements')
                  ->where(DB::raw("month(created_at)"),"=",date("m"))
                  ->where('deviceID', Auth::user()->deviceID)
                  ->pluck('power');
      }
      elseif((date("m") == 03) || (date("m") == 07) || (date("m") == 11))
      {
        // $quarters = DB::table('measurements')
        //           ->select(DB::raw('*'))
        //           ->where(DB::raw("month(created_at)"),">=","month(current_date()) - 1")
        //           ->where("deviceID", "=", "'" . Auth::user()->deviceID . "'")
        //           ->get();
        $quarters = DB::table('measurements')
                  ->where(DB::raw("month(created_at)"),">=",date("m") - 1)
                  ->where('deviceID', Auth::user()->deviceID)
                  ->pluck('power');
      }
      elseif((date("m") == '04') || (date("m") == '08') || (date("m") == '12'))
      {
        $quarters = DB::table('measurements')
                  ->where(DB::raw("month(created_at)"),">=",date("m") - 2)
                  ->where('deviceID', Auth::user()->deviceID)
                  ->pluck('power');
      }
      elseif((date("m") == '05') || (date("m") == '09'))
      {
        $quarters = DB::table('measurements')
                  ->where(DB::raw("month(created_at)"),">=",date("m") - 3)
                  ->where('deviceID', Auth::user()->deviceID)
                  ->pluck('power');
      }
      else
      {
        $quarters = DB::table('measurements')
                  ->where(DB::raw("month(created_at)"),">=",10)
                  ->where('deviceID', Auth::user()->deviceID)
                  ->pluck('power');
      }
      $sum = 0;
      // $i = 0;
      foreach($quarters as $quarter)
      {
        // echo "<p>" . $i++ . " = " . $quarter . "</p>";
        //array_push($m_array, $quarter);
        $sum = $sum + $quarter;//->power;
        //array_push($q_arr[], $q);
      }
      return $sum/340;// / 240; //240 is database saves per hour
    }
}
