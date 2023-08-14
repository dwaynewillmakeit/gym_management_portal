<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Permission::create(['name'=>'view clients']);
      Permission::create(['name'=>'add clients']);
      Permission::create(['name'=>'edit clients']);

      Permission::create(['name'=>'view user accounts']);
      Permission::create(['name'=>'add user accounts']);
      Permission::create(['name'=>'edit user accounts']);

      Permission::create(['name'=>'view payment records']);
      Permission::create(['name'=>'add payment records']);
      Permission::create(['name'=>'edit payment records']);

      $role = Role::create(['name' => 'Admin']);
      $role->givePermissionTo(Permission::all());
    }
}
