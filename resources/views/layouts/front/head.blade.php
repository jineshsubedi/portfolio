<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.settings.meta_description') }}">
    <meta name="author" content="{{ config('app.settings.name') }}">

    <title>{{ config('app.settings.name') }}</title>

    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/unicons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="{{ asset('front/css/tooplate-style.css') }}">

    @yield('style')
</head>

<body>
