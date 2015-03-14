<!DOCTYPE html>
<html>
<head>
  <title>RIOT vela por tí - Hackaton</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  @yield('styles')
</head>
<body>
@include('widgets.navbar')
<div class="wrapper">
@yield('content')
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/notify.min.js')}}"></script>
@yield('scripts')
</body>
</html>
