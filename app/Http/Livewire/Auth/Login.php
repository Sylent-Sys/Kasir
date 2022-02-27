<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $data = [
        'email'=>'',
        'password'=>'',
        'rememberme'=>false,
    ];
    public $rules = [
        'data.email'=>'required',
        'data.password'=>'required',
        'data.rememberme'=>'required'
    ];
    public function render()
    {
        return view('livewire.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate();
        if (Auth::attempt(collect($this->data)->except('rememberme')->all(), $this->data['rememberme'])) {
            if (!Auth::user()['is_aktif']) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
            return redirect(route('dashboard'));
        }
    }
}
