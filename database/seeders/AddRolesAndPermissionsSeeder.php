<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////Team_Manager_Edit
        $permissions = [
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
            "delete-apparel"
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    
        $role=Role::create([
                'name' => 'Team_Manager_Edit',
                'guard_name' => 'web'
        ]);

        $role->syncPermissions($permissions);
        
        // ////Team_Manager_View
        
        // $permissions = [
        //       "view-match-details",

        //        "view-players",

        //         "view-team-players",

        //         "view-apparel"
        // ];
        // $role=Role::create([
        //             'name' => 'Team_Manager_View',
        //             'guard_name' => 'web'
        // ]);
    
        // $role->syncPermissions($permissions);
      
    
        // ////Referee_Edit
    
        // $permissions2 = [
        //     "edit-match-result",
        //     "edit-official-assistant",

        //     "view-match-events",

        //     "add-starting-players",
        //     "add-reserve-players",
        //     "add-subtitute-player",
        //     "add-match-player-caution",
        //     "add-match-equipment-condition",
        //     "add-match-attitude-condition",
        // ];
        // foreach ($permissions2 as $permission) {
        //     Permission::create(['name' => $permission]);
        // }
        // $role2=Role::create([
        //             'name' => 'Referee_Edit',
        //             'guard_name' => 'web'
        // ]);
    
        // $role2->syncPermissions($permissions2);

        // ////Referee_View
        
        // $role=Role::create([
        //             'name' => 'Referee_View',
        //             'guard_name' => 'web'
        // ]);

        // $role->syncPermissions("view-match-events");
                

        // ////Referee_Assessor_Edit
    
        // $permissions = [
        //     "add-referee-evaluation",
        // ];
        // foreach ($permissions as $permission) {
        //         Permission::create(['name' => $permission]);
        // }

        // $role=Role::create([
        //             'name' => 'Referee_Assessor_Edit',
        //             'guard_name' => 'web'
        // ]);
    
        // $role->syncPermissions($permissions);
        // $role->syncPermissions('view-match-events');
        
        // ////Referee_Referee_Assessor_View
    
        
        // $role=Role::create([
        //             'name' => 'Referee_Assessor_View',
        //             'guard_name' => 'web'
        // ]);
    
        // $role->syncPermissions("view-match-events");

 //
        

    }
}
