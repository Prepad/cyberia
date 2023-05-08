<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (Role::where('name', '=', 'admin')->count() > 0) {
            $this->line('Role admin already created');
            return self::SUCCESS;
        };
        /** @var Role $role */
        $role = Role::create(['name' => 'admin']);
        $this->line('Role admin created with id: ' . $role->id);
        $permission = Permission::create(['name' => 'admin']);
        $this->line('Permission admin created with id: ' . $permission->id);
        $role->givePermissionTo($permission);
        $this->line('Permission given to role');

        return self::SUCCESS;
    }
}
