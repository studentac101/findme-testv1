@extends('app.template')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Missing Person Reported in Station</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="Table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Missing Person's name</th>
        <th>Petitioner's Name</th>
        <th>Reported in Station</th>
        <th>Recorded by</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

      @foreach($missings AS $missing)
      <tr>
        <td>{{$missing->missing->first_name}} {{$missing->missing->middle_name}} {{$missing->missing->last_name}}</td>
        <td>{{$missing->petitioner->first_name}} {{$missing->petitioner->middle_name}} {{$missing->petitioner->last_name}}</td>
        <td>{{$missing->station->name}}</td>
        <td>{{$missing->officer->rank}} {{$missing->officer->first_name}} {{$missing->officer->middle_name}} {{$missing->officer->last_name}} of {{$missing->station->name}}</td>
        <td>{{ ($missing->status)? "Missing":"Found" }}</td>
        <td><a href="" class="btn btn-block btn-default" name="button">View Details</a></td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>


@endsection
