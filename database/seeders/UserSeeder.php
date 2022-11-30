<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'name'     => 'SA',
                'email'    => 'superadmin@superadmin.com',
                'password' => Hash::make('superadmin123')
            ]
        );
        $user->assignRole(Role::findByName('Super Admin'));
        $user = User::create(
            [
                'name'     => 'AD',
                'email'    => 'admin@admin.com',
                'password' => Hash::make('admin123')
            ]
        );
        $user->assignRole(Role::findByName('Admin'));
        $user = User::create(
            [
                'name'     => 'UR',
                'email'    => 'user@user.com',
                'password' => Hash::make('user123')
            ]
        );
        $user->assignRole(Role::findByName('User'));
    }
}
