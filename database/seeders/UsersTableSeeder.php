<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Tareas;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'      => 'Yasser Espinoza',
           'email'     => 'admin@gmail.com',
           'password'  => bcrypt('123456'),

       ]);
        User::create([
          'name'      => 'Lidia Espinoza',
          'email'     => 'developer@gmail.com',
          'password'  => bcrypt('123456'),

      ]);
        User::create([
         'name'      => 'Audiel Espinoza',
         'email'     => 'manager@gmail.com',
         'password'  => bcrypt('123456'),

     ]);
        User::create([
        'name'      => 'Carlos Espinoza',
        'email'     => 'Author@gmail.com',
        'password'  => bcrypt('123456'),

    ]);
    }
}
