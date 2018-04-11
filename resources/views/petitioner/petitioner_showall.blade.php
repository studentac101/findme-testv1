@extends('app.template')
@section('content')

<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Show All petitioners in {{ $station }}</h3>
    </div>

    <div class="box-body">
      <table id="Table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Username</th>
          <th>Petitioner's Name</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Date Of Birth</th>
          <th>Nationality</th>
          <th>Contact No.</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($petitioners as $petitioner)
          <tr>
            <td> {{ $petitioner->username }} </td>
            <td> {{ $petitioner->first_name }}&nbsp{{ $petitioner->middle_name }}&nbsp{{ $petitioner->last_name }} </td>
            <td> {{ $petitioner->address }} </td>
            <td> {{ $petitioner->gender }} </td>
            <td> {{ $petitioner->birthdate }} </td>
            <td> {{ $petitioner->nationality }} </td>
            <td> {{ $petitioner->contact_no }} </td>
            <td> {{ $petitioner->email }} </td>
            <td>
              <div class="row">
                <div class="col-xs-12">
                  <a href="{{url('petitioners/showallReports/'.$petitioner->id)}}" class="btn btn-success btn-block">Reports</a>
                  <a href="{{url('petitioners/editPetitioner/'.$petitioner->id)}}" class="btn btn-primary btn-block">Edit</a>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        <!-- <tr> -->
          <!-- <td colspan="9"> -->
            <!-- <div class="col-xs-4 col-xs-offset-4"> -->
              <!-- <button type="button" class="btn btn-primary btn-block">Create a New Petitioner</button> -->
            <!-- </div> -->
          <!-- </td> -->
        <!-- </tr> -->
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
