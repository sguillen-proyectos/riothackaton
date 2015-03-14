@extends('master')

@section('content')
<div class="row" >
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">My RIOT Things</div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <th>ID</th>
            <th>Name</th>
          </thead>
          <tbody>
          @foreach($thing_types as $type)
            <tr>
              <td>{{$type->id}}</td>
              <td>{{$type->name}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
