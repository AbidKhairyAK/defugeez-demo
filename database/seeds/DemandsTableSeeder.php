<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class DemandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        $carbon = Carbon::now()->addMonth();
        $users = DB::table('users')->pluck('id');
        $posts = DB::table('posts')->pluck('id');

        for ($i=0; $i < 800; $i++) { 

    		$user_id = $faker->randomElement($users);
    		$post_id = $faker->randomElement($posts);
    		$date_at = $carbon->subDay()->toDateTimeString();
            $type = $faker->boolean;

    		$data[$i] = [
    			'post_id' => $post_id,
    			'user_id' => $user_id,
    			'name' => $faker->sentence(3),
    			'type' => $type,
    			'status' => $type ?: $faker->boolean(30),
    			'created_at' => $date_at,
    			'updated_at' => $date_at,
    		];
        }

        DB::table('demands')->truncate();
        DB::table('demands')->insert($data);
    }
}
