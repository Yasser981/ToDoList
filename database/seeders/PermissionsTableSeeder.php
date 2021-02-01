<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Tareas;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Role
        //Permisos
        Permission::create(['name' => 'tareas.index']);
        Permission::create(['name' => 'tareas.edit']);
        Permission::create(['name' => 'tareas.show']);
        Permission::create(['name' => 'tareas.create']);
        Permission::create(['name' => 'tareas.destroy']);
        //administrador
        $admin = Role::create(['name' => 'Administrador']);
        $admin->givePermissionTo('tareas.index');
        $admin->givePermissionTo('tareas.edit');
        $admin->givePermissionTo('tareas.show');
        $admin->givePermissionTo('tareas.create');
        $admin->givePermissionTo('tareas.destroy');
        $user = User::find(1);
        $user->assignRole($admin);
        //developer
        $developer = Role::create(['name' => 'developer']);
        $developer->givePermissionTo('tareas.index');
        $developer->givePermissionTo('tareas.edit');
        $user1 = User::find(2);
        $user1->assignRole($developer);

        //Autor
        $autor = Role::create(['name' => 'autor']);
        $autor->givePermissionTo('tareas.index');
        $user2 = User::find(3);
        $user2->assignRole($autor);
        //Manager

        $Manager = Role::create(['name' => 'Manager']);
        $Manager->givePermissionTo('tareas.index');
        $Manager->givePermissionTo('tareas.edit');
        $Manager->givePermissionTo('tareas.show');
        $Manager->givePermissionTo('tareas.destroy');
        $user3 = User::find(4);
        $user3->assignRole($Manager);
    }
}
