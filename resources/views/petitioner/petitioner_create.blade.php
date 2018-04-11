@extends('app.template')
@section('content')
<div class="col-xs-9 col-xs-offset-1">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Create Petitioner</h3>
    </div>

    <div class="box-body">
      <form action="{{url('/petitioners/storePetitioner')}}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-xs-3">
            {{ Form::bsText('username','Username',null,['placeholder'=>'Username']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('first_name','First Name',null,['placeholder'=>'First Name']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('middle_name','Middle Name',null,['placeholder'=>'Middle Name']) }}
          </div>
          <div class="col-xs-3">
            {{ Form::bsText('last_name','Last Name',null,['placeholder'=>'Last Name']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsSelect('gender','Gender',['Male'=>'Male','Female'=>'Female'],null) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsDate('birthdate','Date of Birth',null)}}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('nationality','Nationality',null,['placeholder'=>'Nationality']) }}
          </div>
        </div>

        <div class="row">
          <div class="col-xs-4">
            {{ Form::bsText('address','Address',null,['placeholder'=>'Address']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('contact_no','Contact No',null,['placeholder'=>'Contact No.']) }}
          </div>
          <div class="col-xs-4">
            {{ Form::bsText('email','Email',null,['placeholder'=>'example@example.io']) }}
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <input type="submit" class="btn btn-success btn-block" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
