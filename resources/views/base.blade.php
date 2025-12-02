<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>


    <!-- init tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <section>
        @yield('content')
    </section>

</body>

</html>