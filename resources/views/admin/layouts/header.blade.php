<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - PUtorial</title>

    <link rel="stylesheet" href="{{ asset('./css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./fontawesome/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('./css/style.css') }}"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-lg-5">
            <a class="navbar-brand fw-bold" href="{{ url('./') }}">
                <span class="text-success">P</span>
                <span class="text-light ms-0">Utorials</span>
            </a>
            @if (session()->get('id'))
                <a href="{{ url('/admin/logout') }}" class="btn btn-danger btn-sm">Logout</a>
            @else
                <a href="{{ url('/admin/login') }}" class="btn btn-success btn-sm">Login</a>
            @endif
        </div>
    </nav>
