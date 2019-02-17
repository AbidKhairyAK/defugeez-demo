<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Permission;
use App\Model\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exception = [
        	1 => [],
        	2 => [
        		'delete-event', 'delete-post', 'create-organization', 'update-user'
        	],
        	3 => [
        		'create-event', 'update-event', 'delete-event',
                'delete-post',
                'create-organization', 'update-organization', 'delete-organization',
        		'create-user', 'update-user', 'delete-user'
        	],
        	4 => [
        		'create-event', 'update-event', 'delete-event',
        		'create-post', 'update-post', 'delete-post',
        		'create-refugee', 'update-refugee', 'delete-refugee',
        		'create-demand', 'update-demand', 'delete-demand',
        		'create-organization', 'update-organization', 'delete-organization',
        		'view-user', 'create-user', 'update-user', 'delete-user',
        	],
        ];

        for ($i=1; $i <= 4; $i++) {
        	$permisssions = Permission::orderBy('id')->whereNotIn('slug', $exception[$i])->pluck('id');
        	Role::find($i)->permissions()->sync($permisssions);
        }
    }
}