@extends('master')

@section('content')
<div class="row" >
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>My RIOT Things</b></div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Serial</th>
            <th class="col-md-3">Thing Type</th>
            <th></th>
          </thead>
          <tbody>
          @foreach($things as $thing)
            <tr>
              <td>{{$thing->id}}</td>
              <td>{{$thing->name}}</td>
              <td>{{$thing->serial}}</td>
              <td>{{$thing->thingType->name}}</td>
              {{-- <td><a href="/things/{{$thing->id}}/history">
                <i title="Historic Data" class="fa fa-database"></i>
              </a></td> --}}
              <td><a title="Data Visualization" href="/things/{{$thing->id}}"><i class="fa fa-bar-chart"></i></a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
