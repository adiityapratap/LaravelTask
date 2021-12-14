<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function affiliates(){
        return view('upload');
        exit;
    }

    public function showUploadFile(Request $request) {
      $file = $request->file('affiliates');
      $dublinLatFrom = '53.3340285';
      $dublinLongTo = '-6.2535495';
     
      
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());

      $handle = fopen($destinationPath."/".$file->getClientOriginalName(), "r") or die("Unable to open file!");

    if ($handle) {
    while (($line = fgets($handle)) !== false) {
      $data =   json_decode($line);
      $distance =  $this->affiliates_distance( $dublinLatFrom, $dublinLongTo,$data->latitude,  $data->longitude);

     if($distance < 100){
        $data->distance = $distance;
       $affiliatesDistanceUnder100[$data->affiliate_id] = $data;
     }else{
        $affiliatesDistanceabove100[$data->affiliate_id] = $data;
     }
      
    }
    fclose($handle);
} 

return view('affiliates',['affiliatesDistanceUnder100' => $affiliatesDistanceUnder100]);
    // echo  "<pre>";
    // print_r($affiliatesDistanceUnder100);
    // echo "Above 100 ========================================================================";
    // print_r($affiliatesDistanceabove100);
    // exit;




   }


function affiliates_distance($latitudeFrom, $longitudeFrom,$latitudeTo,  $longitudeTo)
                                    
      {
        // convrted to radian as per task 
           $long1 = deg2rad($longitudeFrom);
           $long2 = deg2rad($longitudeTo);
           $lat1 = deg2rad($latitudeFrom);
           $lat2 = deg2rad($latitudeTo);
             
           //Haversine Formula
           $dlong = $long2 - $long1;
           $dlati = $lat2 - $lat1;
             
           $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
             
           $res = 2 * asin(sqrt($val));
             
           $radius = 3958.756;
             $distance =$res*$radius;
           return number_format($distance,2);
      }


}
