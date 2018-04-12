@extends('app.template')
@section('content')
@if (session('updated'))
<div class="col-xs-12">
  <div class="alert alert-success">
      {{ session('updated') }}
  </div>
</div>
@endif
<div class="col-xs-4">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Petitioner Details</h3>
    </div>
    <div class="box-body">
      {{ Form::bsText('unknown','Username',$petitioner->username,['readonly']) }}
      {{ Form::bsText('unknown',"Petitioner's Name",$petitioner->first_name.' '.$petitioner->middle_name.''.$petitioner->last_name ,['readonly']) }}
      {{ Form::bsText('unknown','Gender',$petitioner->gender,['readonly']) }}
      {{ Form::bsText('unknown','Date of Birth',$petitioner->birthdate,['readonly']) }}
      {{ Form::bsText('unknown','Nationality',$petitioner->nationality,['readonly']) }}
      {{ Form::bsText('unknown','Address',$petitioner->address,['readonly']) }}
      {{ Form::bsText('unknown','Contact No.',$petitioner->contact_no,['readonly']) }}
      {{ Form::bsText('unknown','Email',$petitioner->email,['readonly']) }}
      {{ Form::bsText('unknown','Status',$petitioner->flag ? "Active" : "Deactivated",['readonly']) }}

      <div class="row">
        <form action="{{url('petitioners/activation/'.$petitioner->id)}}" method="post">
          {{csrf_field()}}
          <div class="col-xs-6">
            <button type="submit" onclick="activation(event)" class="btn btn-danger btn-block">{{$petitioner->flag? "Deactivate" : "Activate"}}</button>
          </div>
        </form>
        <form action="" method="post">
          {{csrf_field()}}
          <div class="col-xs-6">
            <button type="submit" onclick="activation(event)" class="btn btn-primary btn-block">Reset Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="col-xs-8">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Petitioner Details</h3>
    </div>

    <div class="box-body">
      <form action="{{url('petitioners/updatePetitioner/'.$petitioner->id)}}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="col-xs-3">
            {{ Form::bsText('username','Username',$petitioner->username,['placeholder'=>'Username']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('first_name','First Name',$petitioner->first_name,['placeholder'=>'First Name']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('middle_name','Middle Name',$petitioner->middle_name,['placeholder'=>'Middle Name']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('last_name','Last Name',$petitioner->last_name,['placeholder'=>'Last Name']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsSelect('gender','Gender',['Male'=>'Male','Female'=>'Female'],$petitioner->gender) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsDate('birthdate','Date of Birth',$petitioner->birthdate)}}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('nationality','Nationality',$petitioner->nationality,['placeholder'=>'Nationality']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('address','Address',$petitioner->address,['placeholder'=>'Address']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('contact_no','Contact No',$petitioner->contact_no,['placeholder'=>'Contact No'])}}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('email','Email',$petitioner->email,['placeholder'=>'Email']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <button type="submit" onclick="activation(event)" class="btn btn-block btn-success">Update details</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
