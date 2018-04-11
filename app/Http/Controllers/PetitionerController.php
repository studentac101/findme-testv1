<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Officer;
use App\Station;
use App\Petitioner;
use App\Incident;
class PetitionerController extends Controller
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
        return view('petitioner.petitioner_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petitioner = new Petitioner();

        $this->validate($request,[
          "username"=>"required|unique:petitioners",
          "first_name"=>"required",
          "middle_name"=>"required",
          "last_name"=>"required",
          "gender"=>"required",
          "birthdate"=>"required",
          "nationality"=>"required",
          "address"=>"required",
          "contact_no"=>"required|min:7|max:11",
          "email"=>"required|email",
        ]);
        $petitioner->station_id = Auth::guard('officer')->user()->station_id;
        $petitioner->username = $request->username;
        $petitioner->first_name = $request->first_name;
        $petitioner->middle_name = $request->middle_name;
        $petitioner->last_name = $request->last_name;
        $petitioner->gender = $request->gender;
        $petitioner->birthdate = $request->birthdate;
        $petitioner->nationality = $request->nationality;
        $petitioner->address = $request->address;
        $petitioner->contact_no = $request->contact_no;
        $petitioner->email = $request->email;

        $petitioner->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $station = Station::find(Auth::guard('officer')->user()->id);
        $petitioners = Petitioner::get();
        return view('petitioner.petitioner_showall',['station'=>$station->name,'petitioners'=>$petitioners]);
    }

    // id of the petitioenr
    public function showallReports($id)
    {
      $station = Station::find(Auth::guard('officer')->user()->station_id);

      $incidents = Incident::with(['missing','officer','station'])->where('petitioner_id',$id)->where('station_id',Auth::guard('officer')->user()->station_id)->get();

      $petitioner = Petitioner::find($id);

      return view('petitioner.petitioner_showallreports',['station'=>$station->name,'incidents'=>$incidents, 'petitioner'=>$petitioner]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $petitioner = Petitioner::find($id);
      return view('petitioner.petitioner_editprofile',['petitioner'=>$petitioner]);
    }


    public function activation($id)
    {
        $petitioner = Petitioner::find($id);
        // check if the petitioner is active or not

        $petitioner->status? $petitioner->status= 0: $petitioner->status = 1;
        $petitioner->save();
        return redirect()->back();

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
