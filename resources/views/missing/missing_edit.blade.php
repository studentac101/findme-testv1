@extends('app.template')
@section('content')



<div class="col-xs-12">
  @if($errors->any())
     @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
  @endif

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Missing Person Record</h3>
    </div>

    <div class="box-body">
      <!-- Form for updating only the image of the missing person without touching the other information of the missing person -->
      <form class=""  enctype="multipart/form-data"  action="" method="post">
        {{csrf_field()}}
        <span style=" font-weight:bold" class="pull-left">Upload image &nbsp</span>
         <button type="submit" name="button" class="btn btn-success btn-sm pull-right">Update Image</button>
        <input type="file" name="avatar">
        <hr>
      </form>

        <br>
        
      <form class="" action="" method="post">
        {{csrf_field()}}

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('first_name','First Name',$missing->first_name,['placeholder'=>'First Name','id'=>'first_name']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('middle_name','Middle Name',$missing->middle_name,['placeholder'=>'Middle Name','id'=>'middle_name']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('last_name','Last Name',$missing->last_name,['placeholder'=>'Last Name','id'=>'last_name']) }}
          </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
              {{ Form::bsDate('birthdate','Date of Birth',$missing->birthdate) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsSelect('gender','Gender',['Male'=>'Male','Female'=>'Female'],$missing->gender) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsDate('date_last_seen','Date Last Seen',$missing->date_last_seen) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsText('nationality','Nationality',$missing->nationality,['placeholder'=>'Nationality']) }}
            </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
              {{ Form::bsSelect('skin_type','Skin Type',['Fair'=>'Fair','Dark'=>'Dark','Olive'=>'Olive'],$missing->skin_type) }}
          </div>
          <div class="col-xs-2">
              {{ Form::bsText('height','Heigth',$missing->height,['placeholder'=>'Height']) }}
          </div>
          <div class="col-xs-2">
              {{ Form::bsText('weight','Weight',$missing->weight,['placeholder'=>'Weight']) }}
          </div>
          <div class="col-xs-4">
              {{ Form::bsText('medical_history','Medical History',$missing->medical_history,['placeholder'=>'medical_history']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('body_marks','Body Marks',$missing->body_marks,['placeholder'=>'Body Marks']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('top','Top',$missing->top,['placeholder'=>'E.g. Red Shirt']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('bottom','Bottom',$missing->bottom,['placeholder'=>'E.g. Black cargo shorts']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" style="resize:none; height:39vh;">{{$missing->description}}</textarea>
            </div>
          </div>

          <div class="col-xs-8">
            <input type="text" hidden name="lat" id="lat" value="{{$missing->lat}}">
            <input type="text" hidden name="lng" id="lng" value="{{$missing->lng}}">
            <div class="form-group">
              <label for="">Last known location</label>
                <input type="text" class="form-control" placeholder="Search..." id="searchbox" value="">
              <div id="mapEditMissing" style="height:35vh;">

              </div>
            </div>
          </div>
        </div>

        <button type="submit" name="button" class="btn btn-success pull-right">Update</button>

      </form>

    </div>
  </div>
</div>

@endsection
