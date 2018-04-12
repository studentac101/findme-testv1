<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sighting;
use App\Incident;
use App\Station;
use Auth;
class SightingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $station = Station::find(Auth::guard('officer')->user()->station_id);
      $sightings = Sighting::with('incident.missing')->where('station_id',Auth::guard('officer')->user()->station_id)->where('status',0)->get();
      return view('sighting.show',['sightings'=>$sightings,'station_name'=>$station->name]);
    }

    public function accept($id)
    {
      $sighting = Sighting::find($id);
      $sighting->status = 1;
      $sighting->incident->sightings_ctr += 1;
      $sighting->save();
      $sighting->incident->save();

                  function send_notification ($tokens, $message)
                  	{

                  		$url = 'https://fcm.googleapis.com/fcm/send';
                  		$fields = array(
                  			 'registration_ids' => $tokens,
                  			 'data' => $message
                  			);
                  		$headers = array(
                  			'Authorization:key = AAAA-UUc1uk:APA91bEw-ajWFV9-8zClTXq8Rhh9WJwwtC3dohNaaRW9miryPY4Ur5ezyU2y1yAmcD6hsZ1f_mTYxQ9YpqMlXbunztbbWqZMeOAlkSaya7h6dG0TuGvalKdklj5xNYmGhfbQunOf4Uk1 ',
                  			'Content-Type: application/json'
                  			);
                  	   $ch = curl_init();
                         curl_setopt($ch, CURLOPT_URL, $url);
                         curl_setopt($ch, CURLOPT_POST, true);
                         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                         curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                         $result = curl_exec($ch);
                         if ($result === FALSE) {
                             die('Curl failed: ' . curl_error($ch));
                         }
                         curl_close($ch);
                         return $result;
                  	}


                    $servername = "localhost";
                    $username = "pftkgwykbk";
                    $password = "PTmfa3paTg";
                    $dbname = "pftkgwykbk";

                      // Create connection
                  $conn = new mysqli($servername, $username, $password,$dbname);
                  $conn->set_charset("utf8");
                  $sql = " Select token FROM petitioners WHERE id='$petitioner_id'";
                  $result = mysqli_query($conn,$sql);
                  $tokens = array();

                  if(mysqli_num_rows($result) > 0 ){
                    while ($row = mysqli_fetch_assoc($result)) {
                      $tokens[] = $row["token"];
                    }
                  }

                  mysqli_close($conn);
                  $message = array("message" => "A new sighting has been updated successfully. Please check your devices.");
                  $message_status = send_notification($tokens, $message);

      return redirect()->back();
    }

    public function decline($id)
    {
      $sighting = Sighting::find($id);
      $sighting->status = 2;
      $sighting->save();
      return redirect()->back();
    }


    public function detail($id)
    {
      $sighting = Sighting::with(['station','incident.missing'])->find($id);
      // continue passing to the view
      return view('sighting.detail',['sighting'=>$sighting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
