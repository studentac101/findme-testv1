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
      <h3 class="box-title">Create new Missing Person Record for {{$petitioner->first_name}}</h3>
    </div>

    <div class="box-body">

      <form class="" enctype="multipart/form-data" action="{{url('missings/storeMissing/'.$petitioner->id)}}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="col-xs-12">
            {{Form::bsFile('avatar','Upload Image',null,['required'])}}
          </div>
        </div>


        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('first_name','First Name',null,['placeholder'=>'First Name']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('middle_name','Middle Name',null,['placeholder'=>'Middle Name']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('last_name','Last Name',null,['placeholder'=>'Last Name']) }}
          </div>
        </div>

        <div class="row">
            <div class="col-xs-3">
              {{ Form::bsDate('birthdate','Date of Birth',null) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsSelect('gender','Gender',['Male'=>'Male','Female'=>'Female'],null) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsDate('date_last_seen','Date Last Seen',null) }}
            </div>
            <div class="col-xs-3">
              {{ Form::bsText('nationality','Nationality',null,['placeholder'=>'Nationality']) }}
            </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
              {{ Form::bsSelect('skin_type','Skin Type',['Fair'=>'Fair','Dark'=>'Dark','Olive'=>'Olive']) }}
          </div>
          <div class="col-xs-2">
              {{ Form::bsText('height','Heigth',null,['placeholder'=>'Height']) }}
          </div>
          <div class="col-xs-2">
              {{ Form::bsText('weight','Weight',null,['placeholder'=>'Weight']) }}
          </div>
          <div class="col-xs-4">
              {{ Form::bsText('medical_history','Medical History',null,['placeholder'=>'Medical History']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('body_marks','Body Marks',null,['placeholder'=>'Body Marks']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('top','Top',null,['placeholder'=>'E.g. Red Shirt']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('bottom','Bottom',null,['placeholder'=>'E.g. Black cargo shorts']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            <div class="form-group">
              <label for="">Description</label>
              <textarea name="description" class="form-control" style="resize:none; height:33vh;"></textarea>
            </div>
          </div>

          <div class="col-xs-8">
            <input type="text" hidden name="lat" id="lat" value="">
            <input type="text" hidden name="lng" id="lng" value="">
            <div class="form-group">
              <label for="">Last known location</label>
              <input type="text" class="form-control" placeholder="Search..." id="searchbox" value="">
              <div id="mapCreateMissing" style="height:30vh;">

              </div>
            </div>
          </div>
        </div>

        <button type="submit" name="button" onclick="activation(event)" class="btn btn-success pull-right">Create</button>

      </form>

    </div>
  </div>
</div>

@endsection
