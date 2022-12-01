<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::create([
      // 'id'=>Str::uuid(),
      'name' => 'Admin',
      'email' => 'admin22@gmail.com',
      'password' => bcrypt('admin123')
    ]);

    $role = Role::create(['name' => 'admin']);

    $permissions = Permission::pluck('id', 'id')->all();

    $role->syncPermissions($permissions);

    $user->assignRole($role);
  }
}
