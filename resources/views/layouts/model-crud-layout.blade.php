<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mido_Anwar') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    <section class="model-crud-form-page">
        <!-- Page Heading -->
        @if (isset($header) || isset($link))
            <header class="navBar">
                <div class="header">
                    {{ $header }}
                </div>
                <div class="link">
                    {{ $link }}
                </div>
            </header>
        @endif
        <main class="content">
            {{ $slot }}
        </main>
    </section>
</body>

</html>
