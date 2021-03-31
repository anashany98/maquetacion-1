<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="">
    
    <title>Faq</title>

    @include('front.layout.style')
</head>
<body>
    <div class="main-content">
        @yield('content')
    </div>

    @include('front.layout.js')   
</body>
</html>