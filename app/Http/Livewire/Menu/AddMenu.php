<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddMenu extends Component
{
    use WithFileUploads;
    public $data;
    public $rules = [
        'data.nama' => 'required',
        'data.harga' => 'required',
        'data.gambar' => 'required',
        'data.deskripsi' => 'required',
        'data.stok' => 'required',
    ];
    public function render()
    {
        return view('livewire.menu.add-menu');
    }
    public function add() {
        $this->validate();
        $this->data["gambar"] = $this->data["gambar"]->store("gambar");
        if(Menu::query()->create($this->data)->save()) {
            return redirect(route('menu.index'));
        }
    }
}
