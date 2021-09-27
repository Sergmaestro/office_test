<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function run()
    {
        // Clear cached permissions
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'api']);
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'api']);
        Role::firstOrCreate(['name' => 'assistant', 'guard_name' => 'api']);
        Role::firstOrCreate(['name' => 'marketing', 'guard_name' => 'api']);
        Role::firstOrCreate(['name' => 'organizer', 'guard_name' => 'api']);
    }
}
