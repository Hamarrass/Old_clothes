<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">





</head>
<body>
    <div   style="margin-left:300px;margin-right:300px">
        <form action="{{route('map.store')}}"  method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Team:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter team" name="name" />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Enter description" name="description"/>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" id="latitude" placeholder="Enter latitude" name="latitude"/>
            </div>
            <div class="form-group">
                <label for="longitude">longitude:</label>
                <input type="text" class="form-control" id="longitude" placeholder="Enter longitude" name="longitude"/>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Submit</button>
        </form>

        <div id="mapid" style="width: 750px; height: 500px;"></div>
    </div>

    @include('map.infopositionteams')
</body>
</html>
