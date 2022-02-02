<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'nik' => rand(1, 9999999999999999),
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@test.test',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'HRD',
                'username' => 'hrd',
                'email' => 'hrd@test.test',
                'password' => Hash::make('password'),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam',
                'username' => 'satpam',
                'email' => 'satpam@test.test',
                'password' => Hash::make('password'),
            ],
        ])->each(function($users){
            $user=User::create($users);
            $user->id === 1 ? $user->assignRole('admin') : '';
            $user->id === 2 ? $user->assignRole('hrd') : '';
            $user->id === 3 ? $user->assignRole('satpam') : '';
        });
    }
}
