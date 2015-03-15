@extends('master')

@section('content')
<div class="row" >
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Thing Data History - <i><u>{{$history->name}}</u></i></b></div>
      <div class="panel-body">
        <b>Unit:</b> {{$history->unit}}
        <br>
        <b>Symbol:</b> {{$history->symbol}}

        <h3>History Data</h3>
        <table class="table">
          <thead>
            <th>Sent At</th>
            <th>Value</th>
          </thead>
          <tbody>
          @foreach($history->results as $item)
            <tr>
              <td>{{Form::unixt($item->at / 1000)}}</td>
              <td>{{$item->value}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@stop

