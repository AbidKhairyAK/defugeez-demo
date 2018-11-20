<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		'organization_id' => 1,
        		'nik' => 1234567891234567,
        		'name' => 'Fulan Al-Furogrammir',
        		'email' => 'fulan@gmail.com',
        		'address' => 'Jl. Bunga RT 10',
        		'province_id' => '11',
        		'regency_id' => '1111',
        		'district_id' => '1111111',
        		'village_id' => '1111111111',
        		'phone' => '082355575557',
        		'status' => 1,
        		'role' => 1,
        		'password' => bcrypt('asdqwe123'),
        		'created_at' => now(),
        		'updated_at' => now(),
        	]
    	);
    }
}
