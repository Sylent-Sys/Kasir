<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Pembayaran;
use App\Models\TransaksiDetail;
use Livewire\Component;

class IndexTransaksi extends Component
{
    public function render()
    {
        return view('livewire.transaksi.index-transaksi',[
            'belumBayar'=>TransaksiDetail::query()->doesntHave('pembayarans')->with('user')->get(),
            'sudahBayar'=>Pembayaran::query()->with(['user','transaksiDetail'])->get()
        ]);
    }
    public function hapus(TransaksiDetail $transaksiDetail) {
        $transaksiDetail->delete();

        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Transaksi berhasil dihapus']);
    }
}
