<!DOCTYPE html>
@include('include.head')

<body style="background-color: #222222;">
@include('include.header')
@yield('content')
@include('include.javascript')
@yield('scripts')
</body>