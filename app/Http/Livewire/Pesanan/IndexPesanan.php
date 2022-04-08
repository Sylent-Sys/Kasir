<?php

namespace App\Http\Livewire\Pesanan;

use App\Models\Menu;
use App\Models\TransaksiDetail;
use App\Models\TransaksiItem;
use Livewire\Component;

class IndexPesanan extends Component
{
    public $dataPesanan = [];
    public $no_meja;
    public $rules = [
        'dataPesanan' => 'required',
        'no_meja'=>'required',
    ];
    public function render()
    {
        return view('livewire.pesanan.index-pesanan', ['data'=>Menu::query()->where('stok', '>', '0')->get()]);
    }
    public function updated()
    {
        foreach ($this->dataPesanan as $key => $value) {
            $data = Menu::find($key);
            if ($data->stok < $value['jumlah']) {
                $this->dispatchBrowserEvent('alert',['type'=>'error','message'=>'Stok tidak mencukupi']);
            }
        }
    }
    public function pesan($totalHarga)
    {
        $this->validate();
        $transaksiDetail = new TransaksiDetail([
            'user_id'=>auth()->user()->id,
            'total'=>$totalHarga,
            'no_meja'=>$this->no_meja
        ]);
        if ($transaksiDetail->save()) {
            foreach ($this->dataPesanan as $key => $value) {
                if ($value['jumlah'] == 0 || $value['jumlah'] == '') {
                    continue;
                }
                // $dataMenu = Menu::find($key);
                // $dataMenu->update(['stok'=>$dataMenu->stok-$value['jumlah']]);
                // Pengganti Kode Diatas Buat Trigger Dengan Kode Dibawah Ini
                // After Insert dengan nama kurangStok di tabel transaksi_items
                // UPDATE `menus` SET `menus`.`stok`=`menus`.`stok`-new.jumlah WHERE `menus`.`id`=new.id_menu
                $transaksiItem = new TransaksiItem([
                    'id_menu'=>$key,
                    'jumlah'=>$value['jumlah']
                ]);
                $transaksiDetail->transaksiItems()->save($transaksiItem);
            }
        }
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Pesanan berhasil ditambahkan']);
        $this->reset(['dataPesanan','no_meja']);
    }
}
