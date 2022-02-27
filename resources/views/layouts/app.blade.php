<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @if (!Request::routeIs('auth.*'))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    @livewireStyles
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>

<body>
    @if (Request::routeIs('auth.*'))
        {{ $slot }}
    @else
        @include('layouts.header')
        <div class="container-fluid">
            <div class="row">
                @include('layouts.sidebar')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    @endif
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
