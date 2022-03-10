<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class IndexMenu extends Component
{
    public function render()
    {
        return view('livewire.menu.index-menu',['data'=>Menu::all()]);
    }
    public function delete(Menu $menu) {
        Storage::delete($menu->gambar);
        // $menu->delete();
        // Buat Procecure dengan nama hapusMenu
        // Buat parameter idMenu tipe integer
        // querynya 'DELETE FROM `menus` WHERE `menus`.`id`=idMenu'
        DB::select("CALL hapusMenu('$menu->id')");
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Menu berhasil dihapus']);
    }
}
