<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Menu;
use Livewire\Component;

class IndexLaporan extends Component
{
    public function render()
    {
        return view('livewire.laporan.index-laporan',['menu'=>Menu::with('transaksiItems')->get()]);
    }
}
