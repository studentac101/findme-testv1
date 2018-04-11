@extends('app.template')
@section('content')
<!-- this row will be the update profile and change password -->
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
        <h3 class="box-title">Edit Profile</h3>
      </div>

      <div class="box-body">
        <!-- left column -->
        <form class=""  enctype="multipart/form-data"  action="{{url('officers/updateAvatar')}}" method="post">
          {{csrf_field()}}
          <span style=" font-weight:bold" class="pull-left">Upload image &nbsp</span>
           <button type="submit" name="button" class="btn btn-sm pull-right">Update Image</button>
          <input type="file" name="avatar">
          <hr>
        </form>

        <form class="" action="{{url('officers/update')}}" method="post">
          {{csrf_field()}}
              <div class="row"><!-- 1st row -->
                <div class="col-xs-3">
                  {{Form::bsText('username','Username',Auth::guard('officer')->user()->username,['placeholder'=>'Username'])}}
                </div>
                <div class="col-xs-3">
                  {{Form::bsText('first_name','First Name',Auth::guard('officer')->user()->first_name,['placeholder'=>'First Name'])}}
                </div>
                <div class="col-xs-3">
                  {{Form::bsText('middle_name','Middle Name',Auth::guard('officer')->user()->middle_name,['placeholder'=>'Middle Name'])}}
                </div>
                <div class="col-xs-3">
                  {{Form::bsText('last_name','Last Name',Auth::guard('officer')->user()->last_name,['placeholder'=>'Last Name'])}}
                </div>
              </div> <!-- 1st row -->

              <div class="row"><!-- 2nd row -->
                <div class="col-xs-4">
                  <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="gender">
                      @if(Auth::guard('officer')->user()->gender == 'Male')
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
                  {{Form::bsText('nationality','Nationality',Auth::guard('officer')->user()->nationality,['placeholder'=>'Nationality'])}}
                </div>

                <div class="col-xs-4">
                  {{Form::bsDate('birthdate','Date of Birth',Auth::guard('officer')->user()->birthdate)}}
                </div>

              </div>  <!-- 2nd row -->

              <div class="row"> <!-- 3rd row -->
                <div class="col-xs-6">
                  {{Form::bsText('contact_no','Contact No.',Auth::guard('officer')->user()->contact_no,['placeholder'=>'Contact No.'])}}
                </div>
                <div class="col-xs-6">
                  {{Form::bsText('email','Email',Auth::guard('officer')->user()->email,['placeholder'=>'Email Address'])}}
                </div>
              </div> <!-- 3rd row -->
            <button type="submit" class="btn btn-info" name="button">Update Profile</button>
        </form>
      </div>
    </div>
  </div>
  <!-- left column -->

  <!-- ------------------------------------------------------------------------------>

  <!-- right column -->
  <div class="col-xs-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Change Password</h3>
      </div>

      <div class="box-body">
        <br>
        <hr>
        <form class="" action="{{url('officers/changePassword')}}" method="post">
          {{csrf_field()}}
          {{Form::bsPassword('old_password','Old Password',['placeholder'=>'Old Password'])}}
          {{Form::bsPassword('password','New Password',['placeholder'=>'New Password'])}}
          {{Form::bsPassword('password_confirmation','Confirm Password',['placeholder'=>'Confirm Password'])}}
          <button type="submit" class="btn btn-success" name="button">Update Password</button>
        </form>
      </div>
    </div>
  </div>
  <!-- right column -->

</div><!-- this row will be the update profile and change password -->


<!-- ------------------------------------------------------------>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Officer's Profile</h3>
      </div>

      <div class="box-body">
        <div class="col-xs-6">
          <center>
            <img src="/uploads/avatars/{{Auth::guard('officer')->user()->avatar}}" class="img-circle" alt="User Image" style="box-shadow: 10px 10px 50px grey;">
          </center>
        </div>
        <div class="col-xs-6">
          <label>Username:</label> {{Auth::guard('officer')->user()->username}}<br>
          <label>Rank:</label> {{Auth::guard('officer')->user()->rank}}<br>
          <label>First Name:</label> {{Auth::guard('officer')->user()->first_name}}<br>
          <label>Middle Name:</label> {{Auth::guard('officer')->user()->middle_name}}<br>
          <label>Last Name:</label> {{Auth::guard('officer')->user()->last_name}}<br>
          <label>Gender:</label> {{Auth::guard('officer')->user()->gender}}<br>
          <label>Nationality:</label> {{Auth::guard('officer')->user()->nationality}}<br>
          <label>Date of Birth:</label> {{Auth::guard('officer')->user()->birthdate}}<br>
          <label>Contact No.:</label> {{Auth::guard('officer')->user()->contact_no}}<br>
          <label>Email Address:</label> {{Auth::guard('officer')->user()->email}}<br>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
@endsection
