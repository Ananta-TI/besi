<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KABESTU</title>
    <link rel="shorcut icon" href="images/logo1.png">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <x-app-layout>

        <div>
            @yield('content')
        </div>
    </x-app-layout>
</body>
</html>
