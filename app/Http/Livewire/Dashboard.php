<?php

namespace App\Http\Livewire;

use App\Helpers\RoleUser;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', ['data'=>User::all()]);
    }
    public function activate(User $user) {
        $user->update(['is_aktif'=>true]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil diaktifkan']);
    }
    public function deactivate(User $user) {
        $user->update(['is_aktif'=>false]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil dinonaktifkan']);
    }
    public function promote(User $user) {
        $user->update(['role'=>$user->role+1]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil dipromosikan menjadi '.RoleUser::getLabel($user->role)]);
    }
    public function demote(User $user) {
        $user->update(['role'=>$user->role-1]);
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil didemosikan menjadi '.RoleUser::getLabel($user->role)]);
    }
    public function delete(User $user) {
        $user->delete();
        $this->dispatchBrowserEvent('alert', ['type'=>'success','message'=>'Akun berhasil dihapus']);
    }
}
