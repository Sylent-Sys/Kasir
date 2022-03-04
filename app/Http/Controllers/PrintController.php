<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function printTransaksi(TransaksiDetail $transaksiDetail) {
        return view('layouts.print', ['data' => $transaksiDetail]);
    }
}
