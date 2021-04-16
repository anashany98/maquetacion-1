@extends('admin.layout.master')

@section('content')

    <div class="table" id="table">
        @yield('table')
    </div>

    <div class="form visible" id="form">
        @yield('form')
    </div>


@endsection