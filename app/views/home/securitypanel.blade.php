@extends('master')

@section('content')
<div class="row" >
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Thing Information</b></div>
      <div class="panel-body">
        <table>
          <tr>
            <td class="col-md-3">
              <b>Name:</b>
            </td>
            <td>
              {{$thing->name}}
            </td>
          </tr>
          <tr>
            <td class="col-md-3">
              <b>Serial:</b>
            </td>
            <td>
              {{$thing->serial}}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@stop
