@extends('app.template')
@section('content')
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Show reports by {{ $petitioner->first_name }}&nbsp{{ $petitioner->last_name }} in {{ $station }}</h3><br><br>
      <a href="{{url('missings/createMissing/'.$petitioner->id)}}" class="btn btn-warning">Create a New Missing Person report</a>
    </div>

    <div class="box-body">
      <table id="Table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Image</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Last Name</th>
          <th>Birthdate</th>
          <th>Gender</th>
          <th>Date Last Seen</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidents as $incident)
          <tr>
            <td><center><img width="100" height="100" src="{{asset('uploads/missings/'.$incident->missing->avatar)}}" alt="" style="border-radius:50%"></center></td>
            <td> {{ $incident->missing->first_name }} </td>
            <td> {{ $incident->missing->middle_name }} </td>
            <td> {{ $incident->missing->last_name }} </td>
            <td> {{ $incident->missing->birthdate }} </td>
            <td> {{ $incident->missing->gender }} </td>
            <td> {{ $incident->missing->date_last_seen }} </td>
            <td>
              <div class="row">
                <div class="col-xs-12">
                  <a href="{{url('missings/editMissing/'.$incident->missing->id)}}" class="btn btn-md btn-primary btn-block">Edit</a>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
