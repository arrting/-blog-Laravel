<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <title>Laravel 文章功能!</title>
</head>
<body>
<main class="m-4">
    @if(session()->has('notice'))
        <div class="bg-red-100 mt-2">
            {{session()->get('notice')}}
        </div>
    @endif

    @yield('main')
</main>
<script src="resources/js/app.js" />
</body>
</html>
