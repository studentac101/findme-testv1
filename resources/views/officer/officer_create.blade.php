@extends('app.template')
@section('content')
<div class="row">
  @if (session('updated'))
  <div class="col-xs-12">
    <div class="alert alert-success">
        {{ session('updated') }}
    </div>
  </div>
  @endif

  @if (session('upderror'))
  <div class="col-xs-12">
    <div class="alert alert-danger">
        {{ session('upderror') }}
    </div>
  </div>
  @endif

<div class="col-xs-10 col-xs-offset-1">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Register Officer</h3>
    </div>

    <div class="box-body">
      <form class="" enctype="multipart/form-data" action="{{url('officers/storeOfficer')}}" method="post">
        {{csrf_field()}}

        <div class="row"> <!-- 1st row -->
          <div class="col-xs-3">
            <span style="font-weight:bold;" class="pull-left">Upload Image: &nbsp</span><input type="file"  class="pull-left btn btn-xs btn-primary" name="avatar" value="">
          </div>
        </div>  <!-- 1st row -->

        <div class="row">
          <div class="col-xs-6">
            <div class="form-group">
              {{ Form::bsSelect('rank','Rank',[
                'PO1' => 'PO1',
                'PO2' => 'PO2',
                'PO3' => 'PO3',
                'SPO1' => 'SPO1',
                'SPO2' => 'SPO2',
                'SPO3' => 'SPO3',
                'SPO4' => 'SPO4',
                'S/Insp.' => 'S/Insp.',
                'C/Insp' => 'C/Insp',
                'Supt.' => 'Supt.',
                'C/Supt.' => 'C/Supt.',
                'S/Supt.' => 'S/Supt.',
                'Dir.' => 'Dir.',
                'DDG.' => 'DDG.',
                'DGen.' => 'DGen.',
              ],null) }}
            </div>
          </div>

          <div class="col-xs-6">
            <div class="form-group">
              <label>Officer Type</label>
              <select class="form-control" name="officer_type">
                <option value=0>Head Officer</option>
                <option value=1>Desk Officer</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row"><!-- 2nd row -->
          <div class="col-xs-3">
            {{Form::bsText('username','Username',null,['placeholder'=>'Username'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('first_name','First Name',null,['placeholder'=>'First Name'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('middle_name','Middle name',null,['placeholder'=>'Middle name'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('last_name','Last Name',null,['placeholder'=>'Last Name'])}}
          </div>
        </div><!-- 2nd row -->


        <div class="row"> <!-- 3rd row -->
          <div class="col-xs-4">
            <div class="form-group">
              <label for="">Gender</label>
              <select class="form-control" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>

          <div class="col-xs-4">
            {{Form::bsText('nationality','Nationality',Null,['placeholder'=>'Nationality'])}}
          </div>

          <div class="col-xs-4">
            {{Form::bsDate('birthdate','Date of Birth')}}
          </div>

        </div>  <!-- 3rd row -->



        <div class="row"> <!-- 4th row -->

          <div class="col-xs-6">
            {{Form::bsText('contact_no','Contact No.',Null,['placeholder'=>'Contact No.'])}}
          </div>
          <div class="col-xs-6">
            {{Form::bsText('email','Email',Null,['placeholder'=>'Email Address'])}}
          </div>
        </div> <!-- 4th row -->

        <div class="row"> <!-- 5th row -->
          <div class="col-xs-6">
            {{Form::bsPassword('password','Password',['placeholder'=>'Password'])}}
          </div>

          <div class="col-xs-6">
            {{Form::bsPassword('password_confirmation','Confirm Password',['placeholder'=>'Confirm Password'])}}
          </div>
        </div>  <!-- 5th row -->
        <button type="submit" class="btn btn-info" name="button">Register Officer</button>

      </form>
    </div>
  </div>
</div>
@endsection
