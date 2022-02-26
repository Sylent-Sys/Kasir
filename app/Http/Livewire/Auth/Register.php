<?php

namespace App\Http\Livewire\Auth;

use App\Helpers\RoleUser;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $data = [
        'name'=>'',
        'email'=>'',
        'password'=>''
    ];
    public $rules = [
        'data.name'=>'required',
        'data.email'=>'required',
        'data.password'=>'required'
    ];
    public function render()
    {
        return view('livewire.auth.register');
    }
    public function register() {
        $this->validate();
        if(User::query()->create(collect($this->data)->merge([
            'role'=>RoleUser::PENGGUNA,
            'is_aktif'=>false,
            'password'=>bcrypt($this->data['password']),
        ])->all())->save()) {
            return redirect()->route('auth.login');
        }
    }
}
