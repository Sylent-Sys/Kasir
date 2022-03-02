<?php

namespace App\Http\Livewire\Pesanan;

use App\Models\Menu;
use App\Models\TransaksiDetail;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexPesanan extends Component
{
    public $dataPesanan = [];
    public $no_meja;
    public $rules = [
        'dataPesanan' => 'required',
        'no_meja'=>'required'
    ];
    public function render()
    {
        return view('livewire.pesanan.index-pesanan', ['data'=>Menu::all()]);
    }
    public function pesan()
    {
        $this->validate();
        $transaksiDetail = new TransaksiDetail([
            'id_user'=>Auth::id(),
            'no_meja'=>$this->no_meja
        ]);
        if($transaksiDetail->save()) {
            foreach ($this->dataPesanan as $key => $value) {
                if($value['jumlah'] == 0 || $value['jumlah'] == '') {
                    continue;
                }
                $dataMenu = Menu::find($key);
                $dataMenu->update(['stok'=>$dataMenu->stok-$value['jumlah']]);
                $transaksiItem = new TransaksiItem([
                    'id_menu'=>$key,
                    'jumlah'=>$value['jumlah']
                ]);
                $transaksiDetail->transaksiItems()->save($transaksiItem);
            }
        }
        $this->dispatchBrowserEvent('alert',['type'=>'success','message'=>'Pesanan berhasil ditambahkan']);
        $this->reset(['dataPesanan','no_meja']);
    }
}
