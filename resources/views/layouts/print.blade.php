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
        <div id="remove" class="pt-3">
            <span>
                <a class="btn btn-success" id="ct"><span class="icon-print"></span> CETAK</a>
            </span>
        </div>
        <center>
            <h4>
                RESTORAN CEPAT SAJI
            </h4>
            <span>
                Jl. XXX No. XXX Ds. XXX, Kec. XXX, Kab. XXX, XXX<br>
                Telp. +628x xxx xxx xxx || E-mail exsample@gmail.com
            </span>
        </center>
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
