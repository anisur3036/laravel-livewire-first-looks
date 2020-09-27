<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/tailwind.min.css">
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900">
        <livewire:comments :initialComments="$comments" />
        @livewireScripts
    </body>
</html>
