@extends('master')

@section('content')
<div class="row" >
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Thing Information</b></div>
      <div class="panel-body">
      <b>Basic Information</b>
        <table>
          <tr>
            <td class="col-md-3">
              <b>Name:</b>
            </td>
            <td colspan="2">
              {{$thing->name}}
            </td>
          </tr>
          <tr>
            <td class="col-md-3">
              <b>Serial:</b>
            </td>
            <td colspan="2">
              {{$thing->serial}}
            </td>
          </tr>
        </table>
        <b>Fields</b>
        <table>
        @foreach($thing->fields as $field)
          <tr>
            <td class="col-md-3">
              <b>Field Name: </b>
            </td>
            <td>
              {{$field->name}} -
              <a title="Data History"
                href="/things/{{$thing->id}}/history/{{$field->id}}">
                <i class="fa fa-database"></i>
              </a>
            </td>
            <td class="col-md-3">
              <b>Measurment Unit: </b>
            </td>
            <td>
              {{$field->unit}}
            </td>
          </tr>
        @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <b>House Sensors</b>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-8">
            <h3>Photo Cell</h3>
            <div id="photo-cell" class="thing-chart"></div>
          </div>
          <div class="col-sm-4">
            <h3>Light Bulb</h3>
            <img src="/img/light_off.png" id="light" style="width: 200px; height: 300px">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <h3>Ultrasonic Sensor</h3>
            <div id="ultrasonic" class="thing-chart"></div>
          </div>
          <div class="col-sm-4">
            <h3>Door Status</h3>
            <img src="/img/closed.png" id="door" style="width: 200px; height: 300px">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <h3>Camera</h3>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <img id="camera" style="width: 300px; height: 300px" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script src="{{asset('js/jquery.flot.min.js')}}"></script>
<script src="{{asset('js/jquery.flot.navigate.min.js')}}"></script>
<script src="{{asset('js/sockjs-0.3.4.min.js')}}"></script>
<script src="{{asset('js/foobar.js')}}"></script>
<script src="{{asset('js/notify.min.js')}}"></script>
<script src="{{asset('js/thingpanel.js')}}"></script>
@stop
