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
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'HRD',
                'username' => 'hrd',
                'email' => 'hrd@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam',
                'username' => 'satpam',
                'email' => 'satpam@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam1',
                'username' => 'satpam1',
                'email' => 'satpam1@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam2',
                'username' => 'satpam2',
                'email' => 'satpam2@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam3',
                'username' => 'satpam3',
                'email' => 'satpam@3test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam4',
                'username' => 'satpam4',
                'email' => 'satpam4@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
            [
                'nik' => rand(1, 9999999999999999),
                'name' => 'Satpam5',
                'username' => 'satpam5',
                'email' => 'satpam5@test.test',
                'password' => Hash::make('password'),
                'phone' => rand(0, 999999999999),
            ],
        ])->each(function ($users) {
            $user = User::firstOrcreate($users);
            $user->id === 1 ? $user->assignRole('admin') : '';
            $user->id === 2 ? $user->assignRole('hrd') : '';
            $user->id >= 3 ? $user->assignRole('satpam') : '';
        });
    }
}
