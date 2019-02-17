<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
        	'Event', 'Post', 'Refugee', 'Demand', 'Organization', 'User', 'Donation', 'Transfer', 'Proof'
        ];
        $actions = [
        	'View', 'Create', 'Update', 'Delete'
        ];

        foreach ($tables as $table) {
        	foreach ($actions as $action) {
        		$data[] = [
        			'name' => $action.' '.$table,
        			'slug' => str_slug($action.' '.$table),
        			'created_at' => now(),
        			'updated_at' => now(),
        		];
        	}
        }

    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	DB::table('permissions')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    	
    	DB::table('permissions')->insert($data);
    }
}
