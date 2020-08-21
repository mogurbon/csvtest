<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPH-EmKWcQtwUGHlUSfL9O4PtToZ8qupE&libraries=places"></script>
</head>

<body>
<div id="app">

    <header>


    </header>
    <content>
       {{-- <div class="container">
            @yield('content')
        </div>--}}
        <csv></csv>
    </content>

    <footer></footer>
</div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>

{{--AIzaSyBPH-EmKWcQtwUGHlUSfL9O4PtToZ8qupE--}}




</html>
