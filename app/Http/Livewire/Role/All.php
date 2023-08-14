<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class All extends Component
{
  use WithPagination;

  protected string $paginationTheme = 'bootstrap';

  public Role $role;

  public array $selectedPermissions = [];

  public array $assignedPermissions = [];

  public function mount(Role $role){
    $this->role = $role;
  }

  public function render()
  {
    $roles = Role::all();
    $permissions = Permission::orderBy('name')->get();

    return view('livewire.role.all', ['roles' => $roles, 'permissions' => $permissions])->extends("layouts.app");
  }

  public function saveRole(): void
  {
    $this->validate();

    $this->role->save();

    session()->flash("success","Role saved");

    redirect()->route('roles.all');
  }

  public function assignPermissions(): void
  {
    $this->role->syncPermissions($this->selectedPermissions);

    session()->flash("success", "Permissions updated for " . $this->role->name);

    redirect()->route('roles.all');
  }

  public function openAddEditRoleModal(Role $selectedRole): void
  {

    $this->role = $selectedRole;

  }

  public function openAssignPermissionModal(Role $selectedRole): void
  {

    $this->role = $selectedRole;

    foreach ($this->role->permissions as $permission) {

      $this->selectedPermissions[] = $permission->name;

    }


  }

  protected array $rules = [
    'role.name' => 'required',
  ];
}
