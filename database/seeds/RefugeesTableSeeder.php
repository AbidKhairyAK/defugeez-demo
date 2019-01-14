<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;
use App\Model\Village;

class RefugeesTableSeeder extends Seeder
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
        $birth = Carbon::now()->subYears(10);
        $genders = ['L', 'P'];
        $bloods = ['A', 'B', 'O', 'AB'];
        $users = DB::table('users')->pluck('id');
        $events = DB::table('events')->pluck('id');

    	for ($i=0; $i < 4000; $i++) { 

    		$user_id = $faker->randomElement($users);
    		$event_id = $faker->randomElement($events);
    		$post_id = $faker->randomElement(DB::table('posts')->where('event_id', $event_id)->pluck('id'));
    		$post = DB::table('posts')->find($post_id);
    		$origin = 'Jl. ' . $faker->address;
            $date_at = $carbon->subDay()->toDateString();
            $birth_date = $birth->subDay()->toDateString();
            $randHealth = $faker->boolean(90);
            $gender = $faker->randomElement($genders);

    		$data[$i] = [
		    	'event_id' => $event_id,
		    	'post_id' => $post_id,
		    	'user_id' => $user_id,
		    	'name' => $faker->name($gender == 'L' ? 'male' : 'female'),
		    	'gender' => $gender,
		    	'origin' => $origin,
		    	'birthdate' => $birth_date,
		    	'health' => $randHealth ? rand(1, 3) : 4,
		    	'status' => rand(1, 4),
		    	'blood_type' => $faker->randomElement($bloods),
		    	'barrack' => rand(1, $post->barracks),
		    	'description' => $faker->sentence(),
                'created_at' => $date_at,
                'updated_at' => $date_at,
    		];
    	}

        DB::table('refugees')->insert($data);
    }
}
