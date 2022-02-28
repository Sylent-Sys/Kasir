<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu;
use Livewire\Component;

class IndexMenu extends Component
{
    public function render()
    {
        return view('livewire.menu.index-menu',['data'=>Menu::all()]);
    }
    public function delete(Menu $menu) {
        $menu->delete();
    }
}
