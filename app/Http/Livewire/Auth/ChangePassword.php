<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Livewire\Component;
use Illuminate\Validation\Rules;

class ChangePassword extends Component
{
  public string $password;
  public string $password_confirmation;
  public User $user;

  public function mount()
  {
    $this->user = auth()->user();

  }

  public function render()
  {
    return view('livewire.auth.change-password')->extends("layouts.app");
  }

  public function save()
  {
    $this->validate([
      'password' => ['required', Rules\Password::defaults(), 'confirmed'],
      'password_confirmation' => ['required'],
    ]);

    $this->user->password = $this->user->hashPassword($this->password);

    $this->user->save();

    session()->flash('success','Password changed');

    return redirect()->route('change-password');
  }

}
