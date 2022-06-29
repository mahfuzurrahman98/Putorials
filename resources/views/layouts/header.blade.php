<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

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
            <a href="javascript:void(0)" class="text-light fs-3 d-lg-none" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-sliders"></i>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex mx-auto" action="tutorials" method="get">
                    <input name="title" class="rounded-pill form-control me-2" type="search"
                        placeholder="Serch Tutorials" aria-label="Search">
                    <button class="rounded-pill btn btn-outline-success" type="submit">
                        <span><i class="me-1 fa-solid fa-magnifying-glass"></i></span>
                        <span></span>
                    </button>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link @yield('home-active')" aria-current="page" href="{{ url('./home') }}">
                            <i class="me-1 fa-solid fa-house"> </i>home
                        </a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link @yield('tut-active')" href="{{ url('./tutorials') }}">
                            <i class="me-1 fa-solid fa-book"> </i>tutorials
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
