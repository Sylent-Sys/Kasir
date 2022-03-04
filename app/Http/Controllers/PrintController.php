<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;

class PrintController extends Controller
{
    public function printTransaksi(TransaksiDetail $transaksiDetail)
    {
        return view('layouts.print', ['data' => $transaksiDetail]);
    }
    public function printLaporan()
    {
        return view('layouts.print', ['data'=>Menu::with('transaksiItems')->get()]);
    }
}
