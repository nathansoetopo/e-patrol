<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'hrd',
                'guard_name' => 'web'
            ],
            [
                'name' => 'satpam',
                'guard_name' => 'web'
            ],
        ])->each(function($roles){
            Role::create($roles);
        });
    }
}
