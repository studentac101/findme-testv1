@extends('app.template')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">Police Officers in {{$station}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="Table" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Image</th>
        <th>Rank</th>
        <th>Officer's Name</th>
        <th>Station</th>
        <th>Officer Type</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
    @foreach($officers AS $officer)
    <tr>
      <td><center><img src="/uploads/avatars/{{$officer->avatar}}" width="100" height="100"></center></td>
      <td>{{$officer->rank}}</td>
      <td>{{$officer->first_name}} &nbsp {{$officer->last_name}}</td>
      <td>{{$officer->station->name}}</td>
                                          <!-- 1            0 -->
      <td>{{$officer->officer_type? "Desk Officer" : "Head Officer"}}</td>
                              <!-- 1            0 -->
      <td>{{$officer->status? "Active" : "Deactivated"}}</td>

      <td>
        <center><a href="{{url('officers/editother/'.$officer->id)}}" class="btn btn-success">View</a></center>
      </td>
    </tr>
    @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
@endsection
