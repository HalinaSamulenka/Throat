<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superuser = User::create([
            'name' => 'Ad Ministrator',
            'email' => 'ad.ministrator@example.com',
            'password' => bcrypt('Password1'),
            //'roles' => ['admin', 'member', 'staff'],
        ]);

        $superuserrole = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $superuserrole->syncPermissions($permissions);
        $superuser->assignRole([$superuserrole->id]);


    }
}
