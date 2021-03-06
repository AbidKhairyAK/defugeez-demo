<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;
use App\Model\Regency;

class EventsTableSeeder extends Seeder
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
        $coords = [
            [
                'lat' => [
                    'min' => -5,
                    'max' => 1,
                ],
                'lng' => [
                    'min' => 100,
                    'max' => 104,
                ],
            ],
            [
                'lat' => [
                    'min' => -3,
                    'max' => 1,
                ],
                'lng' => [
                    'min' => 109,
                    'max' => 116,
                ],
            ],
            [
                'lat' => [
                    'min' => -4,
                    'max' => -2,
                ],
                'lng' => [
                    'min' => 119,
                    'max' => 123,
                ],
            ],
            [
                'lat' => [
                    'min' => -8,
                    'max' => -7,
                ],
                'lng' => [
                    'min' => 105,
                    'max' => 115,
                ],
            ],
            // [
            //     'lat' => [
            //         'min' => -5,
            //         'max' => -0,
            //     ],
            //     'lng' => [
            //         'min' => 131,
            //         'max' => 137,
            //     ],
            // ],
            [
                'lat' => [
                    'min' => -8,
                    'max' => -1,
                ],
                'lng' => [
                    'min' => 137,
                    'max' => 140,
                ],
            ],
        ];
        $events = [
            'Gempa Bumi', 'Tsunami', 'Erupsi Gunung', 'Banjir Bandang', 'Lumpur Panas', 'Kebakaran Hutan', 'Kecelakaan Industri'
        ];

        $island = -1;

        for ($i=0; $i < 10; $i++) { 

            if ($i % 2 == 0) {
                $island++;
            }

            $province = $faker->randomElement(DB::table('provinces')->pluck('id'));
            $regency = $faker->randomElement(DB::table('regencies')->where('province_id', $province)->pluck('id'));
            $id_user = $faker->randomElement(DB::table('users')->where('role_id', 2)->orWhere('role_id', 1)->pluck('id'));
            $date_at = $carbon->subDay()->toDateString();
            $lat = $coords[$island]['lat'];
            $lng = $coords[$island]['lng'];
            $event = $events[rand(0, (count($events) - 1))]. ' ' . Regency::find($regency)->name;

            $data[$i] = [
                'user_id' => $id_user,
                'name' => $event, 
                'slug' => str_slug($event).strtotime($date_at),
                'province_id' => $province, 
                'regency_id' => $regency,
                'damage' => rand(1,4),
                'description' => $faker->paragraph,
                'status' => $faker->boolean(80),
                'created_at' => $date_at,
                'updated_at' => $date_at,
                'latitude' => $faker->latitude($lat['min'], $lat['max']),
                'longitude' => $faker->longitude($lng['min'], $lng['max']),
            ];
        }

        DB::table('events')->insert($data);
    }
}
