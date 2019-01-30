<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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

        $data[0] = [
            'name' => 'Default User',
            'email' => 'user@default.com',
            'password' => bcrypt('asdqwe123'),
            'organization_id' => 1,
            'nik' => $faker->creditCardNumber,
            'address' => 'jl. Raya Krapyak rt 05',
            'province_id' => 34,
            'regency_id' => 3404,
            'district_id' => 3404110,
            'village_id' => 3404110001,
            'phone' => $faker->unique()->e164PhoneNumber,
            'role' => 1,
            'status' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        for ($i=1; $i < 100; $i++) { 
            $organization = $faker->randomElement(DB::table('organizations')->pluck('id'));
            $province = $faker->randomElement(DB::table('provinces')->pluck('id'));
            $regency = $faker->randomElement(DB::table('regencies')->where('province_id', $province)->pluck('id'));
            $district = $faker->randomElement(DB::table('districts')->where('regency_id', $regency)->pluck('id'));
            $village = $faker->randomElement(DB::table('villages')->where('district_id', $district)->pluck('id'));
            $date_at = $carbon->subDay()->toDateString();
            $status = $faker->boolean(80);

            $data[$i] = [
                'name' => $faker->name,
                'email' => $faker->unique()->freeEmail,
                'password' => bcrypt('asdqwe123'),
                'organization_id' => $organization,
                'nik' => $faker->creditCardNumber,
                'address' => 'jl. '.$faker->streetName,
                'province_id' => $province,
                'regency_id' => $regency,
                'district_id' => $district,
                'village_id' => $village,
                'phone' => $faker->unique()->e164PhoneNumber,
                'role' => $status ? rand(2,3) : 4,
                'status' => $status,
                'created_at' => $date_at,
                'updated_at' => $date_at,
            ];
        }
        
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // DB::table('users')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('users')->insert($data);
    }
}
