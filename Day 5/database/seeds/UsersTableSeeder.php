<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Bican\Roles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refugeeRole = Role::where('slug', 'refugee')->first();
        $hermesRole = Role::where('slug', 'hermes')->first();
        $demeterRole = Role::where('slug', 'demeter')->first();
        $adminRole = Role::where('slug', 'admin')->first();

        $user = User::create([
            'fullname' => 'Refugee',
            'username' => 'Refugee',
            'password' => bcrypt('refugee')
        ]);
        $user->attachRole($refugeeRole);

        $user = User::create([
            'fullname' => 'Hermes',
            'username' => 'Hermes',
            'password' => bcrypt('hermes')
        ]);
        $user->attachRole($hermesRole);

        $user = User::create([
            'fullname' => 'Demeter',
            'username' => 'Demeter',
            'password' => bcrypt('demeter')
        ]);
        $user->attachRole($demeterRole);

        $user = User::create([
            'fullname' => 'Administrator',
            'username' => 'Admin',
            'password' => bcrypt('admin')
        ]);
        $user->attachRole($adminRole);
    }
}
