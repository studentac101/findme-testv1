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

<div class="col-xs-6">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Officer's Profile</h3>
    </div>

    <div class="box-body">
      <center><img src="/uploads/avatars/{{$officer->avatar}}" alt="" style="border-radius:50%; box-shadow: 10px 10px 50px grey;"></center>
      <hr>
      <div class="row">
        <div class="col-xs-6">
          {{ Form::bsText('','Username',$officer->username,['readonly']) }}
        </div>
        <div class="col-xs-6">
          {{ Form::bsText('',"Officer's Name",$officer->rank.' '.$officer->first_name.' '.$officer->middle_name.' '.$officer->last_name,['readonly']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-4">
          {{ Form::bsText('','Nationality',$officer->nationality,['readonly']) }}
        </div>
        <div class="col-xs-4">
          {{ Form::bsDate('','Birthdate',$officer->birthdate,['readonly']) }}
        </div>
        <div class="col-xs-4">
          {{ Form::bsText('','Gender',$officer->gender,['readonly']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          {{ Form::bsText('','Contact No.',$officer->contact_no,['readonly']) }}
        </div>
        <div class="col-xs-6">
          {{ Form::bsText('','Email',$officer->email,['readonly']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          {{ Form::bsText('','Officer Type',$officer->officer_type? "Desk Officer" : "Head Officer" ,['readonly']) }}
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          {{ Form::bsText('','Status',$officer->status? "Active" : "Deactivated",['readonly']) }}
        </div>
      </div>

<div class="row">
  <form action="{{url('/officers/activation/'.$officer->id)}}" method="post">
    {{csrf_field()}}
      <div class="col-xs-6">
        <button type="submit" onclick="activation(event)" class="btn btn-primary btn-block">{{$officer->status? "Deactivate" : "Reactivate"}}</button>
      </div>
  </form>
  <form action="{{url('/officers/resetpassword/'.$officer->id)}}" method="post">
    {{csrf_field()}}
      <div class="col-xs-6">
        <button type="submit" onclick="activation(event)" class="btn btn-danger btn-block">Reset Password</button>
      </div>
  </form>
</div>



    </div>
  </div>
</div>

<div class="col-xs-6">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Edit Officer Information</h3>
    </div>

    <div class="box-body">
      <form class="" action="{{url('/officers/updateother/'.$officer->id)}}" method="post">
        {{csrf_field()}}

        <div class="row">
          <div class="col-xs-4">
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
                ],$officer->rank) }}
            </div>
          </div>

          <div class="col-xs-4">
            {{Form::bsSelect('officer_type','Officer Type',[0=>'Head Officer', 1=>'Desk Officer'],$officer->officer_type)}}
          </div>

          <div class="col-xs-4">
            {{Form::bsSelect('station_id','Station',[1 =>'Talamban Police Station 8', 2 => 'Barangay Mabolo Police Station 4'],$officer->station_id)}}
          </div>

        </div>

        <div class="row"><!-- 2nd row -->
          <div class="col-xs-3">
            {{Form::bsText('username','Username',$officer->username,['placeholder'=>'Username','id'=>'username_input'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('first_name','First Name',$officer->first_name,['placeholder'=>'First Name'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('middle_name','Middle name',$officer->middle_name,['placeholder'=>'Middle name'])}}
          </div>
          <div class="col-xs-3">
            {{Form::bsText('last_name','Last Name',$officer->last_name,['placeholder'=>'Last Name'])}}
          </div>
        </div><!-- 2nd row -->


        <div class="row"> <!-- 3rd row -->
          <div class="col-xs-4">
            <div class="form-group">
              <label for="">Gender</label>
              <select class="form-control" name="gender">
                @if($officer->gender == "Male")
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                @else
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                @endif
              </select>
            </div>
          </div>

          <div class="col-xs-4">
            {{Form::bsText('nationality','Nationality',$officer->nationality,['placeholder'=>'Nationality'])}}
          </div>

          <div class="col-xs-4">
            {{Form::bsDate('birthdate','Date of Birth',$officer->birthdate)}}
          </div>

        </div>  <!-- 3rd row -->



        <div class="row"> <!-- 4th row -->

          <div class="col-xs-6">
            {{Form::bsText('contact_no','Contact No.',$officer->contact_no,['placeholder'=>'Contact No.'])}}
          </div>
          <div class="col-xs-6">
            {{Form::bsText('email','Email',$officer->email,['placeholder'=>'Email Address'])}}
          </div>
        </div> <!-- 4th row -->

        <button type="submit" onclick="activation(event)" class="btn btn-success btn-block" name="button">Update Officer Info</button>

      </form>

    </div>
  </div>
</div>

@endsection
