@extends('app.template')
@section('content')

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Sighting Reports for {{$station_name}} Incidents</h3>
    </div>
    <div class="box-body">
      <table id="Table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Missing Person's Information</th>
          <th>Report's Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sightings as $sighting)
          <tr>
            <td><img src="{{asset('/uploads/missings/'.$sighting->incident->missing->avatar)}}" width="80" height="80" alt=""> {{ $sighting->incident->missing->first_name }} &nbsp {{ $sighting->incident->missing->last_name }} </td>
            <td>{{ $sighting->first_name }} &nbsp {{ $sighting->last_name }} </td>
            <td class="col-xs-2">
                  <center>

                    <!-- --------------------------------------------------- -->

                    <form action="{{url('sightings/accept/'.$sighting->id)}}" method="post">
                      {{csrf_field()}}
                      <button href="" class="btn btn-md btn-success btn-block">Accept</button>
                    </form>

                    <!-- --------------------------------------------------- -->

                    <form action="{{url('sightings/decline/'.$sighting->id)}}" method="post">
                      {{csrf_field()}}
                      <button href="" class="btn btn-md btn-danger btn-block">Decline</button>
                    </form>

                    <!-- --------------------------------------------------- -->

                    <a href="{{url('sightings/detail/'.$sighting->id)}}" class="btn btn-md btn-primary btn-block">View</a>
                  </center>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
