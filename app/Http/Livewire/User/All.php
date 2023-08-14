<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class All extends Component
{
  use WithPagination;

  protected string $paginationTheme = 'bootstrap';

  public bool $isEditMode = false;
  public bool $isChangingPassword = false;

  public string $isAccountActive = 'active';
  public string $searchName = '';

  public User $user;

  public string $password;

  public array $assignedRoles = [];

  public function mount(User $user): void
  {
    $this->user = $user;
  }

  public function render()
  {
    $users = User::where('name', 'like', '%' . $this->searchName . '%')
      ->orderBy('name')
      ->paginate(10);

    $roles = Role::orderBy('name')->get();

    return view('livewire.user.all', ['users' => $users, 'roles' => $roles])->extends("layouts.app");
  }


  public function save()
  {
    $this->rules['user.email'] .= ',' . $this->user->id;

    $message = 'User stored';


    if (!$this->isEditMode || $this->isChangingPassword) {
      $this->validate(['password' => ['required', Rules\Password::defaults()]]);
      $this->user->password = Hash::make($this->password);
    }

    if ($this->isEditMode) {
      $this->validate();
      $this->user->is_active = $this->isAccountActive == 'active' ? true : false;
      $message = 'User updated';
    }

    $this->user->save();

    session()->flash("success", $message);

    return redirect()->route('users.all');
  }

  public function assignRolesToUser()
  {

    $this->user->syncRoles($this->assignedRoles);

    session()->flash("success", "Record Saved");

    return redirect()->route('users.all');
  }

  public function openAddEditUserModal(User $user, bool $isEditMode = false): void
  {
    $this->user = $user;

    $this->isEditMode = $isEditMode;

    if ($this->isEditMode) {
      $this->isAccountActive = $user->is_active ? 'active' : 'disable';
    }

  }

  public function openRolesModal(User $user): void
  {
    $this->user = $user;

    $this->assignedRoles = [];
    foreach ($this->user->getRoleNames() as $role) {

      $this->assignedRoles[] = $role;
    }

  }


  protected array $rules = [
    'user.name' => 'required|min:3',
    'user.email' => 'required|email|unique:users,email',
  ];
}
