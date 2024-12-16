<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KABESTU</title>
    <link rel="shorcut icon" href="images/logo1.png">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <head>
        <!-- Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <!-- Leaflet JavaScript -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    </head>

</head>
<body>
    <x-app-layout>

        <div>
            @yield('content')
        </div>
    </x-app-layout>
</body>
</html>
