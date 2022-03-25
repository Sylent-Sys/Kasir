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
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->get();
        }
        if ($mode == 'bulanan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, MONTH(created_at) as bulan, YEAR(created_at) as tahun, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->having('tahun', $tahun)->having('bulan', $bulan)->get();
        }
        if ($mode == 'tahunan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, YEAR(created_at) as tahun, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->having('tahun', $tahun)->get();
        }
        if ($mode == 'favorit') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->orderBy('sum_jumlah', 'desc')->groupBy('id_menu')->get();
        }
        return view('layouts.print', ['data'=>$data]);
    }
}
