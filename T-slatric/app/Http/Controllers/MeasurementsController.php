<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;

class MeasurementsController extends Controller
{
    //private $p;
  //  private $dID;

    public function saveData(Request $request)
    {

          $receivedData = new Measurement;

          $receivedData->power = $request->input('power');
          $receivedData->deviceID = $request->input('deviceID');
          $receivedData->user_id = $request->input('user_id');

          //$p = $receivedData->power;
          // $this->setPower($receivedData->power);
          //$this->dID = $receivedData->deviceID;
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
    //  $fp = fopen('json/power.json', 'r');
      //fread($fp, json_decode());
      $json_read = file_get_contents('json/power.json');
      $power = json_decode($json_read, true);
      // $power = 5;
      // return ['power' => $power];//, 'deviceID' => $this->dID];
      return $power;
    }
}
