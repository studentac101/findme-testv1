@extends('app.template')
@section('content')

<div class="col-xs-4">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Petitioner Details</h3>
    </div>
    <div class="box-body">
      {{ Form::bsText(null,'Username',$petitioner->username,['readonly']) }}
      {{ Form::bsText(null,"Petitioner's Name",$petitioner->first_name.' '.$petitioner->middle_name.''.$petitioner->last_name ,['readonly']) }}
      {{ Form::bsText(null,'Gender',$petitioner->gender,['readonly']) }}
      {{ Form::bsText(null,'Date of Birth',$petitioner->birthdate,['readonly']) }}
      {{ Form::bsText(null,'Nationality',$petitioner->nationality,['readonly']) }}
      {{ Form::bsText(null,'Address',$petitioner->address,['readonly']) }}
      {{ Form::bsText(null,'Contact No.',$petitioner->contact_no,['readonly']) }}
      {{ Form::bsText(null,'Email',$petitioner->email,['readonly']) }}
      {{ Form::bsText(null,'Status',$petitioner->flag ? "Active" : "Deactivated",['readonly']) }}

      <div class="row">
        <form action="" method="post">
          {{csrf_field()}}
          <div class="col-xs-6">
            <button type="submit" class="btn btn-danger btn-block">{{$petitioner->flag? "Deactivate" : "Activate"}}</button>
          </div>
        </form>
        <form action="" method="post">
          {{csrf_field()}}
          <div class="col-xs-6">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
      <form action="#" method="post">
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
            <button type="submit" class="btn btn-block btn-success">Update details</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
