<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use Redirect;
use Image;
use Storage;
use App\Incident;
use App\Petitioner;
use App\Missing;
class MissingController extends Controller
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
    public function create($id)
    {
        $petitioner = Petitioner::find($id);
        return view('missing.missing_create',['petitioner' => $petitioner]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $missing = new Missing();

      $incident = new Incident();

      $petitioner = Petitioner::find($id);
      
      if($request->hasFile('avatar')){
        $this->validate($request,['avatar'=>'image']);

        // get image
        $avatar = $request->file('avatar');
        // change file name
        $filename = time().'.'.$avatar->getClientOriginalExtension();
        // make the image to save in public folder of the application
        $image = Image::make($avatar)->resize(300,300)->save(public_path('uploads/missings/'.$filename));
        // save image in local directory
        Storage::disk('uploads')->put($filename,$image);
        $missing->imgurl = 'http://192.168.254.107/findme/img/'.$filename;
        $missing->avatar = $filename;
      }


      // first validate all fields
      $this->validate($request,[
        'first_name'=>'required',
        'middle_name'=>'required',
        'last_name'=>'required',
        'birthdate'=>'required',
        'gender'=>'required',
        'nationality'=>'required',
        'lat'=>'required',
        'lng'=>'required',
        'date_last_seen'=>'required',
        'skin_type'=>'required',
        'height'=>'required',
        'weight'=>'required',
        'medical_history'=>'required',
        'body_marks'=>'required',
        'top'=>'required',
        'bottom'=>'required',
      ]);


      $missing->first_name = $request->first_name;
      $missing->middle_name = $request->middle_name;
      $missing->last_name = $request->last_name;
      $missing->birthdate = $request->birthdate;
      $missing->gender = $request->gender;
      $missing->nationality = $request->nationality;
      $missing->lat= $request->lat;
      $missing->lng= $request->lng;
      $missing->date_last_seen = $request->date_last_seen;
      $missing->skin_type = $request->skin_type;
      $missing->height = $request->height;
      $missing->weight = $request->weight;
      $missing->medical_history = $request->medical_history;
      $missing->body_marks = $request->body_marks;
      $missing->top = $request->top;
      $missing->bottom = $request->bottom;
      $missing->description = $request->description;
      $missing->save();

      $incident->petitioner_id = $id;
      $incident->missing_id=$missing->id;
      $incident->station_id = Auth::guard('officer')->user()->station_id;
      $incident->officer_id = Auth::guard('officer')->user()->id;
      $incident->status = 1;
      $incident->save();
      return redirect('/officers');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $missing = Missing::find($id);
        return view('missing.missing_edit',['missing'=>$missing]);
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
