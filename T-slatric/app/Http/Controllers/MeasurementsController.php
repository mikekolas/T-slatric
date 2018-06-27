<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MeasurementsController extends Controller
{
    public function __construct()
    {

    }

    public function saveData(Request $request)
    {

          $receivedData = new Measurement;

          $receivedData->power = $request->input('power');
          $receivedData->deviceID = $request->input('deviceID');

          $fp = fopen('json/power.json', 'w');
          $p = ['power' => (float)$receivedData->power];
          fwrite($fp, json_encode($p));
          fclose($fp);

          $receivedData->save();
          return "done";
          //return response('record saved', 200)->header('Content-Type', 'text/plain');
    }

    public function getData()
    {
      // dd($request->user());
      // $username = Auth::user()->username;
      // $json_read = file_get_contents('json/' . $username . '.json');
      $json_read = file_get_contents('json/power.json');
      $power = json_decode($json_read, true);
      return $power;
    }
}
