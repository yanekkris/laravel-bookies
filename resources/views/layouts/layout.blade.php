<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>{{$title ?? ''}} | Books Project</title>
</head>
<body>
        @include('partials/header')
    <main>
        @include('partials/navigation')
        <section class="main">
            @yield('content')
        </section>
    </main>

</body>
</html>