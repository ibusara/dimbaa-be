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
        $this->addPermissions();

        $this->addDataManagerWithPermissions();
        $this->addLeagueDirectorWithPermissions();
        $this->addTeamManagerRoleWithPermissions();
        $this->addMatchOfficalsWithPermissions();
        $this->addSuperAdminWithPermissions();
        $this->addTeamAdminWithPermissions();
    }
    
    public function addSuperAdminWithPermissions(){
        $permissions = [

            "view-notifications",
            "view-users",
            "add-user",
            "edit-user",
            "delete-user",

            'view-role', 
            'add-role', 
            'edit-role', 
            'delete-role',

            'view-team', 
            'edit-team', 
            'add-team', 
            'delete-team',

            'view-stadium',
            'edit-stadium',
            'add-stadium',
            'delete-stadium',
        ];
        
        $role=Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($permissions);
    }

    public function addTeamAdminWithPermissions(){
        $permissions = [
            "view-notifications",
            "View-staff",
            "view-team-players",
            "add-team-players",
            "view-apparel",
            "add-apparel",
            "edit-apparel",
            "delete-apparel",
            "edit-stadium",
        ];
        $role=Role::create([
            'name' => 'Team Admin',
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($permissions);
    }

    public function addMatchOfficalsWithPermissions(){
        $permissions = [
            "view-notifications",
            'view-match-events',
            'edit-match-event',
            'assign-match-event',
            'view_scoreboard', 
            'add-tournament',
            'add-prematch-reported',
            'add-prematch-condition',
            'add-prematch-operation',
            'add-prematch-co-operation',
            'add-prematch-colors',
            'add-prematch-store-issues',
            'add-prematch-store-challenges',
            'add-prematch-report-final',
            'add-post-match-report',
            'view-region',
            'view-match-officals',
            'edit-match-result',
            'add-match-official-conditions',
            'add-information',
            'add-incident-step5',
            'add-remarks',
            'add-name',
            'add-date',
            'add-coordination-meeting',
            'add-play-fair',
            'add-performance-behaviour',
            'add-incident',
            'app-pitch-condition',
            'add-dressing-room',
            'add-stretcher-ambulance',
            "add-referee-evaluation",
            "edit-official-assistant",
            "add-starting-players",
            "add-reserve-players",
            "add-subtitute-player",
            "add-match-player-caution",
            "add-match-equipment-condition",
            "add-match-attitude-condition",
        ];
        $role=Role::create([
            'name' => 'Match Officials',
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($permissions);

    }

    public function addDataManagerWithPermissions(){
        $permissions = [
            "view-notifications",
            "add-tournament",
            "view-match-events",
            "add-match-event", 
            "edit-match-event",
            "assign-match-event",
            "view_scoreboard", 
        ];
        $role=Role::create([
            'name' => 'Data Manager',
            'guard_name' => 'web'
        ]);

        $role->syncPermissions($permissions);


    }

    public function addLeagueDirectorWithPermissions(){
        $permissions = [
            "view-notifications",
            'view-match-events',
            'view_scoreboard',
        ];
        $role=Role::create([
            'name' => 'League Director',
            'guard_name' => 'web'
        ]);

        $role->syncPermissions($permissions);
    }
    public function addTeamManagerRoleWithPermissions(){
        $permissions = [
            "View_match_details",
            "view-notifications",
            "View-staff",
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
        
        $role=Role::create([
            'name' => 'Team Manager',
            'guard_name' => 'web'
        ]);

        $role->syncPermissions($permissions);
    }

    public function addPermissions(){
        $permissions = [
            "view-notifications",
            "view-users",
            "add-user",
            "edit-user",
            "delete-user",
            'view-role', 
            'add-role', 
            'edit-role', 
            'delete-role',

            'view-team', 
            'edit-team', 
            'add-team', 
            'delete-team',
            'view-stadium',
            'edit-stadium',
            'add-stadium',
            'delete-stadium',


            "add-match-event",
            "view-match-details",

            "view-staff",

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

            "edit-match-result",
            "edit-official-assistant",

            "view-match-events",

            "add-starting-players",
            "add-reserve-players",
            "add-subtitute-player",
            "add-match-player-caution",
            "add-match-equipment-condition",
            "add-match-attitude-condition",

            "add-referee-evaluation",

            'add-prematch-reported', 
            'add-prematch-condition', 
            'add-prematch-operation', 
            'add-prematch-co-operation', 
            'add-prematch-colors',
            'add-prematch-store-issues', 
            'add-prematch-store-challenges',
            'add-prematch-report-final', 

            'view_scoreboard',
            'add-tournament',

            'view-region',
            'view-match-officals',

            'add-match-official-conditions',
            'add-information',
            'add-incident-step5',
            'add-remarks',
            'add-name',
            'add-date',

            'add-coordination-meeting',
            'add-play-fair',
            'add-performance-behaviour',
            'add-incident',
            'app-pitch-condition',
            'add-dressing-room',
            'add-stretcher-ambulance',

            'add-post-match-report',
            "edit-match-event",
            'assign-match-event',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }       
}