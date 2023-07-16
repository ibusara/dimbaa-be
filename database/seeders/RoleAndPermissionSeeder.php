<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array(
            //users
            array('name'=>'view-users'),
            array('name'=>'create-users'),
            array('name'=>'edit-users'),
            array('name'=>'delete-users'),

            //teams
            array('name'=>'view-teams'),
            array('name'=>'create-teams'),
            array('name'=>'edit-teams'),
            array('name'=>'delete-teams')
        );

        foreach ($permissions as $permission){
            $exist = DB::table('permissions')->where('name',$permission['name'])->first();
            if (!$exist){
                Permission::create($permission);
            }
        }
        /*Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'view-teams']);
        Permission::create(['name' => 'create-teams']);
        Permission::create(['name' => 'edit-teams']);
        Permission::create(['name' => 'delete-teams']);*/

        $roles = array(
            array('name'=>'Admin'),
            array('name'=>'Editor')
        );
        foreach ($roles as $role){
            if (!DB::table('roles')->where('name',$role['name'])->exists()){
                $createdRole = Role::create($role);
                switch (strtolower($role['name'])){
                    case 'editor':
                        $createdRole->givePermissionTo([
                            'create-teams',
                            'edit-teams',
                            'edit-users',
                            'delete-teams',
                        ]);
                        break;
                    case 'admin':
                        $createdRole->givePermissionTo([
                            'view-users',
                            'create-users',
                            'edit-users',
                            'delete-users',
                            'view-teams',
                            'create-teams',
                            'edit-teams',
                            'delete-teams',
                        ]);
                        break;
                    
                }
            }
        }

        /*$adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-teams',
            'create-teams',
            'edit-teams',
            'delete-teams',
        ]);

        $editorRole->givePermissionTo([
            'create-teams',
            'edit-teams',
            'edit-users',
            'delete-teams',
        ]);*/

      
}
}