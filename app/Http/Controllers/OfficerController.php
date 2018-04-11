<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Officer;
use App\Station;
use App\Incident;
use Auth;
use Image;
use Hash;
use Session;
class OfficerController extends Controller
{

    // guard will prevent other user from different table to login or access any links but

    // in my case i used guard so i can use the Auth function of laravel

    // user() will return the current user instance

    // Auth::guard()->user()
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $missings = Incident::with(['incident','missing','officer.station','station'])->get();
      // dd($missings[0]->petitioner->first_name);
      return view('officer.officer_homepage',['missings'=>$missings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('officer.officer_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $officer = new Officer();
      // has file

      if($request->hasFile('avatar')){
        $this->validate($request,[
          "avatar"=>"image",
          "rank"=>"required",
          "officer_type"=>"required",
          "username"=>"required|unique:officers|min:5",
          "first_name"=>"required",
          "middle_name"=>"required",
          "last_name"=>"required",
          "gender"=>"required",
          "nationality"=>"required",
          "birthdate"=>"required",
          "contact_no"=>"required",
          "email"=>"required|email",
          "password"=>"required|confirmed",
        ]);
        $avatar = $request->file('avatar');
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
        $officer->avatar = $filename;
        $officer->station_id = Auth::guard('officer')->user()->station_id;
        $officer->rank = $request->rank;
        $officer->officer_type = $request->officer_type;
        $officer->username = $request->username;
        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->gender = $request->gender;
        $officer->nationality = $request->nationality;
        $officer->birthdate = $request->birthdate;
        $officer->contact_no = $request->contact_no;
        $officer->email = $request->email;
        $officer->password = bcrypt($request->password);
        $officer->save();
      }

      // no file
      else{
        $this->validate($request,[
          "rank"=>"required",
          "officer_type"=>"required",
          "username"=>"required|unique:officers|min:5",
          "first_name"=>"required",
          "middle_name"=>"required",
          "last_name"=>"required",
          "gender"=>"required",
          "nationality"=>"required",
          "birthdate"=>"required",
          "contact_no"=>"required",
          "email"=>"required|email",
          "password"=>"required|confirmed",
        ]);
        $officer->station_id = Auth::guard('officer')->user()->station_id;
        $officer->rank = $request->rank;
        $officer->officer_type = $request->officer_type;
        $officer->username = $request->username;
        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->gender = $request->gender;
        $officer->nationality = $request->nationality;
        $officer->birthdate = $request->birthdate;
        $officer->contact_no = $request->contact_no;
        $officer->email = $request->email;
        $officer->password = bcrypt($request->password);

        $officer->save();
      }
      Session::flash('updated','Your password was successfully updated!');
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

        // first parameter for the where function of laravel is the column name
        //show all officers in the station where the current user is loggedin & and it will exclude itself from the results
        //order by their last name
        $officers = Officer::where('station_id',Auth::guard('officer')->user()->station_id)->where('id','!=',Auth::guard('officer')->user()->id)->with(['station'])->orderBy('last_name')->get();
        $station = Station::find(Auth::guard('officer')->user()->station_id);
        return view('officer.officer_showall',['officers'=>$officers,'station'=>$station]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */









                                // UPDATE USER INFORMATION / RESET PASSWORD / DECACTIVATE AND REACTIVATION OF ACCOUNT

                                // DISPLAY EDIT PROFILE
    public function edit()
    {
      return view('officer.officer_editprofile');
    }







                              // UPDATE PROFILE
    public function update(Request $request)
    {
        $officer = Officer::find(Auth::guard('officer')->user()->id);
        $newUsername = $request->username;
        $oldUsername = $officer->username;

        $changedUsername = ($newUsername != $oldUsername)? 1 : 0;

        if($changedUsername){
            $this->validate($request,[
              "username" => "required|unique:officers",
            ]);
            $officer->username = $request->username;
        }

        $this->validate($request,[
          "username" => "required",
          "first_name" => "required",
          "middle_name" => "required",
          "last_name" => "required",
          "gender" => "required",
          "nationality" => "required",
          "birthdate" => "required",
          "contact_no" => "required",
          "email" => "required|email",
        ]);
        $officer->username = $request->username;
        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->gender = $request->gender;
        $officer->nationality = $request->nationality;
        $officer->birthdate = $request->birthdate;
        $officer->contact_no = $request->contact_no;
        $officer->email = $request->email;
        $officer->save();
        Session::flash('updated','Your profile was successfully updated!');
        return redirect()->back();
    }





                                    // UPDATE PROFILE PICTURE



    public function updateAvatar(Request $request)
    {
      $officer = Officer::find(Auth::guard('officer')->user()->id);
      if($request->hasFile('avatar')){
        $this->validate($request,[
          "avatar"=>"image",
        ]);
        $avatar = $request->file('avatar');

        $filename = time().'.'.$avatar->getClientOriginalExtension();

        Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
        $officer->avatar = $filename;

        $officer->save();
        Session::flash('updated','Your profile picture was successfully updated!');
        return redirect()->back();
      }
      else {
        Session::flash('upderror','Error updating your profile picture!');
        return redirect()->back();
      }

    }






                              // DISPLAY EDIT INFORMATION OF OTHER OFFICER


    public function editOther($id)
    {
      if(Auth::guard('officer')->user()->id == $id){
        return redirect()->back();
      }
      else{
        $officer = Officer::find($id);
        return view('officer.officer_editother',['officer'=>$officer]);
      }
    }







                              // UPDATE INFORMATION OF OTHER OFFICER

    public function updateOther(Request $request,$id)
    {

      $officer = Officer::find($id);

      $newUsername = $request->username;
      $oldUsername = $officer->username;

      $changedUsername = ($newUsername != $oldUsername)? 1 : 0;

      if($changedUsername){
        $this->validate($request,[
          "username" => "required|unique:officers",
        ]);
        $officer->username = $request->username;
      }

        $this->validate($request,[
          "rank" => "required",
          "officer_type" => "required",
          "station_id" => "required",
          "username" => "required",
          "first_name" => "required",
          "middle_name" => "required",
          "last_name" => "required",
          "gender" => "required",
          "nationality" => "required",
          "birthdate" => "required",
          "contact_no" => "required",
          "email" => "required|email",
        ]);

        $officer->rank = $request->rank;
        $officer->officer_type = $request->officer_type;
        $officer->station_id = $request->station_id;
        $officer->username = $request->username;
        $officer->first_name = $request->first_name;
        $officer->middle_name = $request->middle_name;
        $officer->last_name = $request->last_name;
        $officer->gender = $request->gender;
        $officer->nationality = $request->nationality;
        $officer->birthdate = $request->birthdate;
        $officer->contact_no = $request->contact_no;
        $officer->email = $request->email;
        $officer->save();

        Session::flash('updated','Information was successfully updated!');
        return redirect()->back();


    }



    public function changePassword(Request $request)
    {
      $officer = Officer::find(Auth::guard('officer')->user()->id);
      $this->validate($request,[
        "old_password" => "required",
        "password" => "required|confirmed",
      ]);
      $match = Hash::check($request->old_password,$officer->password);
      if($match){
        $officer->password = bcrypt($request->password);
        $officer->save();
        Session::flash('updated','Your password was successfully updated!');
        return redirect()->back();
      }
      else {
        Session::flash('upderror','Error updating your password!');
        return redirect()->back();
      }
    }

    public function resetPassword($id)
    {
      $officer = Officer::find($id);
      $officer->password = bcrypt('default');
      $officer->save();
      Session::flash('updated','Password was successfully updated!');
      return redirect()->back();
    }

    public function activation($id)
    {
      $officer = Officer::find($id);

      // if true make it false and vice versa
      $officer->status? $officer->status = 0 : $officer->status = 1;

      $officer->save();

      return redirect()->back();

    }

}
