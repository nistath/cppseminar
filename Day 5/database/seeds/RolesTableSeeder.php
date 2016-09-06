<?php

use Illuminate\Database\Seeder;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$loginDashboardPermission = Permission::where('slug', 'login.dashboard')->first();
		$manageHubsPermission = Permission::where('slug', 'manage.hubs')->first();
		$manageRefugeesPermission = Permission::where('slug', 'manage.refugees')->first();
		$managePermissionsPermission = Permission::where('slug', 'manage.permissions')->first();

		$refugeeRole = Role::create([
		    'name' => 'Refugee',
		    'slug' => 'refugee'
		]);

		$hermesRole = Role::create([
		    'name' => 'Hermes',
		    'slug' => 'hermes'
		]);
		$hermesRole->attachPermission($loginDashboardPermission);
		$hermesRole->attachPermission($manageRefugeesPermission);

		$demeterRole = Role::create([
		    'name' => 'Demeter',
		    'slug' => 'demeter'
		]);
		$demeterRole->attachPermission($loginDashboardPermission);
		$demeterRole->attachPermission($manageHubsPermission);

		$administratorRole = Role::create([
		    'name' => 'Administrator',
		    'slug' => 'admin'
		]);
		$administratorRole->attachPermission($loginDashboardPermission);
		$administratorRole->attachPermission($manageHubsPermission);
		$administratorRole->attachPermission($manageRefugeesPermission);
		$administratorRole->attachPermission($managePermissionsPermission);

    }
}
