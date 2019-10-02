<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

class RoleTableSeeder extends Seeder
{

    public function run()
    {
        $newbie = new \App\Models\Role();
        $newbie->name = 'Newbie';
        $newbie->save();

        $user = new \App\Models\Role();
        $user->name = 'User';
        $user->save();

        $superuser = new \App\Models\Role();
        $superuser->name = 'Superuser';
        $superuser->save();

        $moderator = new \App\Models\Role();
        $moderator->name = 'Moderator';
        $moderator->save();

        $staff = new \App\Models\Role();
        $staff->name = 'Staff';
        $staff->save();

        $admin = new \App\Models\Role();
        $admin->name = 'Admin';
        $admin->save();
    }
}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $role_admin = \App\Models\Role::where('name', 'Admin')->first();
        $role_staff = \App\Models\Role::where('name', 'Staff')->first();
        $role_newbie = \App\Models\Role::where('name', 'Newbie')->first();

        $admin = new \App\Models\User();
        $admin->first_name = 'Jacob';
        $admin->last_name = 'Beck';
        $admin->full_name = 'Jacob Beck';
        $admin->username = 'jacbec1';
        $admin->email = 'admin@example.com';
        $admin->avatar = 'no-photo.png';
        $admin->password = bcrypt('Password+1');
        $admin->security_token = bcrypt(str_random(32));
        $admin->save();
        $admin->roles()->attach($role_admin);

        $staff = new \App\Models\User();
        $staff->first_name = 'Jacob';
        $staff->last_name = 'Beck';
        $staff->full_name = 'Jacob Beck';
        $staff->username = 'jacbec2';
        $staff->email = 'staff@example.com';
        $staff->avatar = 'no-photo.png';
        $staff->password = bcrypt('Password+1');
        $staff->security_token = bcrypt(str_random(32));
        $staff->save();
        $staff->roles()->attach($role_staff);

        $newbie = new \App\Models\User();
        $newbie->first_name = 'Jacob';
        $newbie->last_name = 'Beck';
        $newbie->full_name = 'Jacob Beck';
        $newbie->username = 'jacbec3';
        $newbie->email = 'newbie@example.com';
        $newbie->avatar = 'no-photo.png';
        $newbie->password = bcrypt('Password+1');
        $newbie->security_token = bcrypt(str_random(32));
        $newbie->save();
        $newbie->roles()->attach($role_newbie);
    }
}
