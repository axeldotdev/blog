<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ $description }}">

    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="{{ $description }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@axeldotdev" />
    <meta name="twitter:creator" content="@axeldotdev" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-800">
    <header class="flex flex-col justify-center items-center pt-8 lg:pt-16">
        <img class="inline-block h-14 w-14 rounded-full" src="/images/about/axel-charpentier.jpeg"
            alt="Axel Charpentier">
        <p class="mt-2 font-sans font-medium text-lg text-gray-900 dark:text-white">
            Axeldotdev
        </p>
    </header>

    <x-navbar />

    {{ $slot }}

    <x-footer />

    <script src="https://tarptaeya.github.io/repo-card/repo-card.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
