<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		[
    			'name' => 'Super Admin',
    			'slug' => 'super-admin',
    			'created_at' => now(),
    			'updated_at' => now(),
    		],
    		[
    			'name' => 'Admin',
    			'slug' => 'admin',
    			'created_at' => now(),
    			'updated_at' => now(),
    		],
    		[
    			'name' => 'Relawan',
    			'slug' => 'relawan',
    			'created_at' => now(),
    			'updated_at' => now(),
    		],
    		[
    			'name' => 'Akun Biasa',
    			'slug' => 'akun-biasa',
    			'created_at' => now(),
    			'updated_at' => now(),
    		],
    	];

    	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	DB::table('roles')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    	DB::table('roles')->insert($data);
    }
}
