<?php

namespace App\Http\Livewire\Laporan;

use App\Models\TransaksiItem;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class IndexLaporan extends Component
{
    public $bulan;
    public $tahun;
    public $array_bulan;
    public $array_tahun;
    public $mode;
    public function mount()
    {
        $this->array_tahun = TransaksiItem::query()->selectRaw('YEAR(created_at) as tahun')->groupBy('tahun')->get()->pluck('tahun')->toArray();
        $this->array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $this->tahun = $this->array_tahun[0];
        $this->bulan = 1;
        $this->mode = 'semua';
    }
    public function render()
    {
        if ($this->mode == 'semua') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->get();
        }
        if ($this->mode == 'bulanan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, MONTH(created_at) as bulan, YEAR(created_at) as tahun, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->having('tahun', $this->tahun)->having('bulan', $this->bulan)->get();
        }
        if ($this->mode == 'tahunan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, YEAR(created_at) as tahun, SUM(jumlah) as sum_jumlah')->groupBy('id_menu')->having('tahun', $this->tahun)->get();
        }
        if ($this->mode == 'favorit') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->orderBy('sum_jumlah', 'desc')->groupBy('id_menu')->get();
        }
        Debugbar::info($data);
        return view('livewire.laporan.index-laporan', ['laporan'=>$data]);
    }
}
