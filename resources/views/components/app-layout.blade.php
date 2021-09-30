<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $description }}">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    {{ $slot }}

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
