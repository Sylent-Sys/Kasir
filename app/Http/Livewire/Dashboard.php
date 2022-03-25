<?php

namespace App\Http\Livewire;

use App\Helpers\RoleUser;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $listeners = ['setRoleUser'];
    public function render()
    {
        return view('livewire.dashboard', ['data'=>User::all()]);
    }
    public function setActive(User $user) {
        $user->update(['is_aktif'=>!$user->is_aktif]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil '. ($user->is_aktif ? 'diaktifkan' : 'dinonaktifkan')]);
    }
    public function setRoleUser(User $user, $role) {
        $user->update(['role'=>$role]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil diubah menjadi '.RoleUser::getLabel($role)]);
    }
    public function delete(User $user) {
        $user->delete();
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil dihapus']);
    }
}
