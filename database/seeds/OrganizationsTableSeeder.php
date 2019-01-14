<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
    	$fakerDK = Factory::create('de_DK');
        $carbon = Carbon::now()->addMonth();
        $instances = ['Ormas', 'Persatuan', 'Aksi', 'Kelompok', 'Pemuda', 'Relawan']; 

        for ($i=1; $i <= 10; $i++) { 

        	$provinces = $faker->randomElement(DB::table('provinces')->pluck('id'));
        	$regencies = $faker->randomElement(DB::table('regencies')->where('province_id', $provinces)->pluck('id'));
        	$districts = $faker->randomElement(DB::table('districts')->where('regency_id', $regencies)->pluck('id'));
        	$villages = $faker->randomElement(DB::table('villages')->where('district_id', $districts)->pluck('id'));
            $date_at = $carbon->subDay()->toDateString();

            $data[$i] = [
                'name' => $faker->randomElement($instances).' '.$fakerDK->unique()->firstName.' '.$fakerDK->unique()->lastName,
                'address' => 'Jl. '.$faker->unique()->streetName,
                'village_id' => $villages,
                'district_id' => $districts,
                'regency_id' => $regencies,
                'province_id' => $provinces,
                'email' => $faker->unique()->freeEmail,
                'phone' => $faker->unique()->e164PhoneNumber,
                'account_number' => $faker->unique()->creditCardNumber,
                'profile' => $faker->paragraphs(3, true),
                'logo' => 'logo-'.$i.'.png',
                'created_at' => $date_at,
                'updated_at' => $date_at,
            ];
        }

        // DB::table('organizations')->truncate();
        DB::table('organizations')->insert($data);
    }
}
