<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'users-list',
           'users-create',
           'users-edit',
           'users-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'vendor-list',
           'vendor-create',
           'vendor-edit',
           'vendor-reject',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
