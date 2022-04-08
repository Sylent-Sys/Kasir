<?php

namespace App\Http\Livewire\Laporan;

use App\Models\TransaksiItem;
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
        $this->array_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $this->tahun = intval($this->array_tahun[0]??date('Y'));
        $this->bulan = intval(date('m'));
        $this->mode = 'semua';
    }
    public function render()
    {
        $this->array_tahun = TransaksiItem::query()->selectRaw('YEAR(created_at) as tahun')->groupBy('tahun')->get()->pluck('tahun')->toArray();
        if ($this->mode == 'semua') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->groupBy('menu_id')->get();
        }
        if ($this->mode == 'bulanan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->whereYear('created_at', $this->tahun)->whereMonth('created_at', $this->bulan)->groupBy('menu_id')->get();
        }
        if ($this->mode == 'tahunan') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->whereYear('created_at', $this->tahun)->groupBy('menu_id')->get();
        }
        if ($this->mode == 'favorit') {
            $data = TransaksiItem::query()->with('menu')->selectRaw('*, SUM(jumlah) as sum_jumlah')->orderBy('sum_jumlah', 'desc')->groupBy('menu_id')->get();
        }
        return view('livewire.laporan.index-laporan', ['laporan'=>$data]);
    }
}
