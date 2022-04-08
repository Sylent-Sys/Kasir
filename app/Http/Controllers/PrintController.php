<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use App\Models\TransaksiDetail;

class PrintController extends Controller
{
    public function printTransaksi(TransaksiDetail $transaksiDetail)
    {
        return view('layouts.print', ['data' => $transaksiDetail]);
    }
    public function printLaporan($mode, $bulan, $tahun)
    {
        if ($mode == 'semua') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->groupBy('menu_id')->get();
        }
        if ($mode == 'bulanan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->groupBy('menu_id')->get();
        }
        if ($mode == 'tahunan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->whereYear('created_at', $tahun)->groupBy('menu_id')->get();
        }
        if ($mode == 'favorit') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->orderBy('sum_jumlah', 'desc')->groupBy('menu_id')->get();
        }
        return view('layouts.print', ['data'=>$data]);
    }
}
