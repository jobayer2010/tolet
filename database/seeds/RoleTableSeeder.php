<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'A Admin User';
        $role_admin->save();
        $user = User::find(2);
        $user->roles()->attach($role_admin);

        $role_reguser = new Role();
        $role_reguser->name = 'reguser';
        $role_reguser->description = 'A Registerd User';
        $role_reguser->save();
        $user = User::find(1);
        $user->roles()->attach($role_reguser);
    }
}
