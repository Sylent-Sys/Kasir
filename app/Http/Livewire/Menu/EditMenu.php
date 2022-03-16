<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditMenu extends Component
{

    use WithFileUploads;
    public Menu $menu;
    public $gambar;
    public $rules = [
        'menu.nama' => 'required',
        'menu.harga' => 'required',
        'gambar' => 'image',
        'menu.stok' => 'required',
    ];
    public function render()
    {
        return view('livewire.menu.edit-menu');
    }
    public function edit() {
        $this->validate();
        if($this->gambar) {
            Storage::delete($this->menu->gambar);
            $this->menu->gambar = $this->gambar->store("gambar");
        }
        if($this->menu->save()) {
            return redirect(route('menu.index'));
        }
    }
}
