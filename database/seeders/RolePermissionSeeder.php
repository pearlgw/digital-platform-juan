<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage users',
            'manage products',
            'view products',
            'transaksi products'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
            ]);
        }

        $resellerRole = Role::firstOrCreate([
            'name' => 'reseller'
        ]);

        $resellerPermission = [
            'view products',
            'transaksi products'
        ];

        $resellerRole->syncPermissions($resellerPermission);

        $userReseller = User::create([
            'name' => 'Reseller',
            'email' => 'reseller@gmail.com',
            'password' => bcrypt('password'),
            'no_telfon' => '+628578389383',
            'alamat' => 'bawen'
        ]);

        $userReseller->assignRole($resellerRole);

        $produsenRole = Role::firstOrCreate([
            'name' => 'produsen'
        ]);

        $produsenPermission = [
            'manage products',
        ];

        $produsenRole->syncPermissions($produsenPermission);

        $userProdusens = [
            [
                'name' => 'Produsen1',
                'email' => 'produsen1@gmail.com',
                'password' => bcrypt('password'),
                'no_telfon' => '+628578389383',
                'alamat' => 'ngawen'
            ],
            [
                'name' => 'Produsen2',
                'email' => 'produsen2@gmail.com',
                'password' => bcrypt('password'),
                'no_telfon' => '+628578389383',
                'alamat' => 'ngawen'
            ],
            [
                'name' => 'Produsen3',
                'email' => 'produsen3@gmail.com',
                'password' => bcrypt('password'),
                'no_telfon' => '+628578389383',
                'alamat' => 'ngawen'
            ],
        ];

        foreach($userProdusens as $userProdusen){
            $createdProdusen = User::create($userProdusen);
            $createdProdusen->assignRole($produsenRole);
        }

        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'no_telfon' => '+6285870254510',
            'alamat' => 'ungaran'
        ]);

        $userAdmin->assignRole($adminRole);
    }
}