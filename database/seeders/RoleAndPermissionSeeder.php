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
            array('name'=>'Editor'),
            array('name' =>'Team_Manager_Edit'),
            array('name' => 'Team_Manager_View'),
            array('name' => 'Referee_View'),
            array('name' => 'Referee_Edit'),
            array('name' => "Referee_Assessor_View"),
            array('name' => "Referee_Assessor_Edit")
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
                    case 'Team_Manager_Edit':
                        $createdRole->givePermissionTo([
                            "view-match-details",

                             "view-players",
                             "add-players",
                             "edit-players",
                             "delete-players",

                             "view-team-players",
                             "add-team-players",


                             "view-apparel",
                             "add-apparel",
                             "edit-apparel",
                             "delete-apparel",
                        ]);
                        break;
                    case 'Team_Manager_View':
                        $createdRole->givePermissionTo([
                    
                            "view-match-details",
    
                            "view-players",
    
                            "view-team-players",
    
                            "view-apparel",
                        ]);
                        break;
                    case 'Referee_View':
                        $createdRole->givePermissionTo([
                            "view-match-events",
                        ]);
                        break;
                    case 'Referee_Edit':
                        $createdRole->givePermissionTo([
                            "edit-match-result",
                            "edit-official-assistant",
    
                            "view-match-events",
    
                            "add-starting-players",
                            "add-reserve-players",
                            "add-subtitute-player",
                            "add-match-player-caution",
                            "add-match-equipment-condition",
                            "add-match-attitude-condition",
                        ]);
                        break;
                    case 'Referee_Assessor_View':
                        $createdRole->givePermissionTo([
                            'view-match-events',
                        ]);
                        break;
                        
                    case 'Referee_Assessor_Edit':
                        $createdRole->givePermissionTo([
                            'view-match-events',
                            
                            "add-referee-evaluation",
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

        /////////////////////// add/edit/view team manager role
                        
        // $roles = array('name'=>'Team_Manager_Edit');
                        
        // if (!DB::table('roles')->where('name',$role['name'])->exists()){
        //     $createdRole = Role::create($role);
                
        //             $createdRole->givePermissionTo([
                    
        //                 "view-match-details",

        //                 "view-players",
        //                 "add-players",
        //                 "edit-players",
        //                 "delete-players",

        //                 "view-team-players",
        //                 "add-team-players",


        //                 "view-apparel",
        //                 "add-apparel",
        //                 "edit-apparel",
        //                 "delete-apparel",
        //             ]);
                
        //     }

        
        // /////////////////////// view team manager role
        
        // $roles = array('name'=>'Team_Manager_View');
        
        // if (!DB::table('roles')->where('name',$role['name'])->exists()){
        //     $createdRole = Role::create($role);
                
        //             $createdRole->givePermissionTo([
                    
        //                 "view-match-details",

        //                 "view-players",

        //                 "view-team-players",

        //                 "view-apparel",
        //             ]);
                
        // }

        // ////////////////////// Referee View
        // $roles = array('name'=>'Referee_View');
        
        // if (!DB::table('roles')->where('name',$role['name'])->exists()){
        //     $createdRole = Role::create($role);
                
        //          $createdRole->givePermissionTo([
        //                 "view-match-events",
        //         ]);
                
        // }

    //     ////////////////////// Referee CRUD
    //     $roles = array('name'=>'Referee_Edit');
        
    //     if (!DB::table('roles')->where('name',$role['name'])->exists()){
    //         $createdRole = Role::create($role);
                
    //                 $createdRole->givePermissionTo([
    //                     "edit-match-result",
    //                     "edit-official-assistant",

    //                     "view-match-events",

    //                     "add-starting-players",
    //                     "add-reserve-players",
    //                     "add-subtitute-player",
    //                     "add-match-player-caution",
    //                     "add-match-equipment-condition",
    //                     "add-match-attitude-condition",
    //                 ]);
    //    }

       
    //     ////////////////////// Referee assessor View
    //     $roles = array('name'=>'Referee_Assessor_View');
        
    //     if (!DB::table('roles')->where('name',$role['name'])->exists()){
    //         $createdRole = Role::create($role);
    //                 $createdRole->givePermissionTo([
    //                     'view-match-events',
    //                 ]);
    //    }
    //     ////////////////////// Referee assessor CRUD
    //     $roles = array('name'=>'Referee_Assessor_Edit');
        
    //     if (!DB::table('roles')->where('name',$role['name'])->exists()){
    //         $createdRole = Role::create($role);
    //                 $createdRole->givePermissionTo([
    //                     'view-match-events',
                        
    //                     "add-referee-evaluation",
    //                 ]);
    //    }
}
}