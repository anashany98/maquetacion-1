<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="">
    
    <title>Laravel</title>

    @include('admin.layout.partials.style')
</head>

<body>

    <div class="wrapper">
        <div class="top-bar">
            <div class="left-side">
                <div  class="sidebar-button">
                    <svg  viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                    </svg>
                </div>
            </div>
            <div class="rigth-side">
                <div class="title-page">
                    @lang('admin/faqs.parent_section')
                </div>  
            </div>
            
        </div>
    
        @include('admin.layout.partials.sidebar')

        <div class="main"> 
            @yield('content')
        </div>
       
    </div>
    
    @include('admin.layout.partials.js')
</body>
</html>