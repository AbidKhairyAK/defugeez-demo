<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;
use App\Model\Village;

class PostsTableSeeder extends Seeder
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

    	for ($i=1; $i < 50; $i++) {

            $event_id = $faker->randomElement(DB::table('events')->pluck('id'));
            $user_id = $faker->randomElement(DB::table('users')->pluck('id'));
            $event = DB::table('events')->find($event_id);
            $province = $event->province_id;
            $regency = $event->regency_id;
            $district = $faker->randomElement(DB::table('districts')->where('regency_id', $regency)->pluck('id'));
            $village = $faker->randomElement(DB::table('villages')->where('district_id', $district)->pluck('id'));
            $name = 'Posko '.$faker->lastName.' '.Village::find($village)->name;
            $coord = [
                'lat' => $event->latitude,
                'lng' => $event->longitude,
            ];
            $lat = $coord['lat'] + 0.1;
            $lng = $coord['lng'] + 0.1;
            $date_at = $carbon->subDay()->toDateString();

    		$data[$i] = [
		    	'user_id' => $user_id,
		    	'organization_id' => '1',
		    	'event_id' => $event_id,
		    	'name' => $name,
		    	'pic' => 'Bapak '.$faker->name,
		    	'address' => 'Jl. '.$faker->unique()->streetName, 
		    	'province_id' => $province, 
		    	'regency_id' => $regency, 
		    	'district_id' => $district, 
		    	'village_id' => $village,
		    	'capacity' => rand(5, 60) * 10,
		    	'barracks' => rand(1, 15),
		    	'description' => $faker->paragraph,
		    	'status' => $faker->boolean(80),
                'created_at' => $date_at,
                'updated_at' => $date_at,
                'latitude' => $faker->latitude($coord['lat'], $lat),
                'longitude' => $faker->longitude($coord['lng'], $lng),
    		];
    	}

        DB::table('posts')->insert($data);
    }
}
