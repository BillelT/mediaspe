<!DOCTYPE html>
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Know')</title>

    <link rel="shortcut icon" href="/favicon.png" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black font-sans antialiased min-h-screen flex flex-col">

    <main class="flex-grow flex flex-col justify-center">
        @yield('content')
    </main>

</body>

</html>