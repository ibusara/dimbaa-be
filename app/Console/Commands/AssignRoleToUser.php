<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use DB;
use Spatie\Permission\Models\Role;

class AssignRoleToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:assign-role-to-user {email} {role_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigning role to user ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $get_user = User::where('email','=',$email)->first();
        if(!$get_user){
            echo "User does not exist\n\n";
            return "";
        }
        
        $role_id = $this->argument('role_id');
        $get_role = Role::where('id','=',$role_id)->first();
        if(!$get_role){
            echo "Role does not exist\n\n";
            return "";
        }
        
        DB::table('model_has_roles')->insert([
            'role_id' => $role_id,
            'model_type' => 'App\Models\User',
            'model_id' => $get_user->id
        ]);

         
        $role_hass_permissions = DB::table('role_has_permissions')->where('role_id','=',$role_id)->get();
        foreach ($role_hass_permissions as $permission) {
            $data = \DB::select
            ("
                INSERT INTO `dimbaa_be_db`.`model_has_permissions` (`permission_id`, `model_type`, `model_id`)
                VALUES ($permission->permission_id, 'App\\Models\\User', $get_user->id);
            ");
       }

        return Command::SUCCESS;
    }
}
