<?php

namespace App\Http\Livewire;

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
    }
    public function deactivate(User $user) {
        $user->update(['is_aktif'=>false]);
    }
    public function promote(User $user) {
        $user->update(['role'=>$user->role+1]);
    }
    public function demote(User $user) {
        $user->update(['role'=>$user->role-1]);
    }
    public function delete(User $user) {
        $user->delete();
    }
}
