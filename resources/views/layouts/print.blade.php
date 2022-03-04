<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>

<body class="p-3">
    <page size="A4" id="printArea">
        @if (Request::routeIs('transaksi.print'))
            @include('layouts.printLayouts.transaksi')
        @else
            @include('layouts.printLayouts.laporan')
        @endif
    </page>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/print.js') }}"></script>
</body>

</html>
