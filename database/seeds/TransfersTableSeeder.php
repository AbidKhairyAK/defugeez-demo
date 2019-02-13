<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class TransfersTableSeeder extends Seeder
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
        $donations = DB::table('donations')->pluck('id');

        for ($i=0; $i < 800; $i++) { 
    		$user_id = $faker->randomElement($users);
    		$donation_id = $faker->randomElement($donations);
    		$date_at = $carbon->subDay()->toDateTimeString();
        	$bank = ['BRI', 'BNI', 'BCA', 'MANDIRI'];

        	$data[$i] = [
        		'user_id' => $user_id,
        		'donation_id' => $donation_id,
                'slug' => $donation_id.strtotime($date_at),
                'bank' => $faker->randomElement($bank),
                'amount' => (rand(1, 1000) * 1000) + rand(111, 999),
                'account_number' => $faker->creditCardNumber,
        		'status' => $faker->boolean(),
        		'created_at' => $date_at,
        		'updated_at' => $date_at
        	];
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('transfers')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('transfers')->insert($data);
    }
}
