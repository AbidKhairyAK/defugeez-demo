<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class ProofsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $carbon = Carbon::now()->addWeek();
        $users = DB::table('users')->pluck('id');
        $transfers = DB::table('transfers')->pluck('id');

        for ($i=0; $i < 400; $i++) { 
    		$user_id = $faker->randomElement($users);
    		$transfer_id = $faker->randomElement($transfers);
    		$date_at = $carbon->subDay()->toDateTimeString();

        	$data[$i] = [
        		'user_id' => $user_id,
        		'transfer_id' => $transfer_id,
                'slug' => $transfer_id.strtotime($date_at),
        		'image' => 'proof.png',
        		'created_at' => $date_at,
        		'updated_at' => $date_at
        	];
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('proofs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('proofs')->insert($data);
    }
}
