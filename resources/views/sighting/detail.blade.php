@extends('app.template')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Sighting Details</h3>
  </div>
  <div class="box-body">
    <div class="container-fluid">
      <!-- map -->
      <div class="row">
        <input hidden type="text" name="" id="lat" value="{{$sighting->lat}}">
        <input hidden type="text" name="" id="lng" value="{{$sighting->lng}}">
        <div id="mapSightingDetail" style="height:50vh;">
        </div>
      </div>
      <div class="row">

      </div>
    </div>
  </div>
</div>
@endsection
