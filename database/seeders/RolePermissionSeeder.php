<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       $permissions =[
        'create product',
        'edit product',
        'delete product',
       ];

       foreach($permissions as $permission){
           Permission::updateOrCreate(['name' => $permission]);
       }

         $administrator = Role::updateOrCreate(['name' => 'owner']);
         $administrator->givePermissionTo(['create product', 'edit product', 'delete product']);

         $user = Role::updateOrCreate(['name' => 'user']);
         $user->givePermissionTo(['create product']);

         $adminUser = User::updateOrCreate([
             'name' => 'Administrator',
             'email' => 'owner@sayurku.co.id',
             'password' => bcrypt('admin123')
         ]);
         $adminUser->assignRole('owner'); 

         $User = User::updateOrCreate([
            'name' => 'Administrator',
            'email' => 'user@sayurku.co.id',
            'password' => bcrypt('admin123')
        ]);
        $User->assignRole('user'); 
    }
}
