<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class DonationsTableSeeder extends Seeder
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
        $limit = Carbon::now()->addWeeks(6);
        $users = DB::table('users')->pluck('id');
        $regencies = DB::table('regencies')->pluck('name');
        $prefixes = [
        	'Donasi Korban Bencana ',
        	'Mari Bantu Pembangunan Pasca Bencana ',
        	'Mari Atasi Kekurangan Pangan Korban Bencana ',
        	'Bangun Kembali Kota ',
        	'Donasi Untuk Pakaian Pengungsi Bencana ',
        	'Donasi Untuk Makanan Pengungsi Bencana ',
        	'Donasi Untuk Obat-Obatan Pengungsi Bencana ',
        	'Mari Salurkan Sedikit Harta Kita Untuk Korban Bencana ',
        ];
        $lorem = [
        	"<h4>Sed auctor tellus maximus quis</h4><p>Ut sagittis erat pretium, feugiat augue et, pellentesque risus. Curabitur efficitur massa velit, sed auctor tellus maximus quis. Quisque a sem justo. Nam finibus commodo augue quis eleifend. Praesent vel vehicula eros. Ut tellus nisl, mollis eu quam quis, elementum cursus nunc. Aenean pulvinar massa nec ligula ultricies, ut facilisis turpis interdum. Aenean tristique augue sed est sagittis, ut congue ipsum imperdiet. Quisque sed mi elit. Fusce quis lobortis risus. Cras luctus, sapien vel ullamcorper elementum, dolor nibh accumsan nisl, vel pellentesque tortor massa eget nibh. In eget nulla turpis. Fusce tempor turpis eget velit dapibus lacinia. Nunc dui arcu, luctus vitae lacus vitae, porttitor aliquam odio.</p><p>Nullam hendrerit nisl vitae lorem gravida, in fermentum ex semper. Sed non mauris eu velit porttitor egestas. Sed sit amet congue massa, id ornare ex. Phasellus malesuada facilisis odio, at dapibus massa hendrerit vel. Morbi sed interdum magna. Nam condimentum aliquet lorem at bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer id elit et risus pellentesque commodo eget nec nunc. Maecenas sollicitudin massa libero, sed dapibus magna iaculis ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in metus quam. Sed commodo ipsum magna, ac laoreet nunc consequat et. Nam vitae porttitor orci, non vestibulum ligula. Nunc malesuada metus purus, ac consectetur purus consectetur eu.</p>",
        	"<h4>At cursus magna mauris id ligula</h4><p>Donec porta, sem et condimentum dignissim, lorem ante consequat risus, at cursus magna mauris id ligula. Sed ut ultricies nunc, et volutpat ante. Nulla faucibus dolor ut metus volutpat, eu hendrerit ipsum tincidunt. Duis faucibus ante eget pellentesque sollicitudin. Sed a pellentesque ipsum, quis sagittis metus. Nullam erat quam, eleifend in mollis nec, vulputate vel enim. Proin eros quam, posuere in diam nec, faucibus blandit sem.</p><p>In sit amet sagittis orci. In aliquet nec sem quis vehicula. Vivamus et ultrices libero, eget laoreet urna. Maecenas egestas libero quis euismod rutrum. Nam quis rutrum risus, eget suscipit tortor. Suspendisse sodales imperdiet dignissim. Nulla vulputate turpis est, in ultrices elit vehicula eu. Mauris condimentum arcu sit amet ex blandit iaculis. Aenean fermentum justo augue, ac consequat quam hendrerit quis. Phasellus dui felis, fringilla eget dapibus eu, mollis eu nisi.</p><p>Fusce tempus eros a mi semper vulputate ac eget sapien. Nullam fermentum vitae quam nec dignissim. Nunc a nibh nunc. Morbi et ante iaculis, interdum lacus at, maximus felis. Mauris consectetur leo in magna dapibus efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris sollicitudin dapibus scelerisque. Sed eu pellentesque odio. Nam sed magna vel risus ullamcorper feugiat. Suspendisse potenti. Cras ultricies felis a velit aliquam, id lacinia orci dictum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed et ante porta, finibus dui sed, placerat lacus. Donec sit amet risus sagittis mi consectetur posuere. Morbi sagittis ex justo, ut suscipit lacus lacinia in.</p>"
    	];

        for ($i=0; $i < 50; $i++) { 
        	
            $user_id = $faker->randomElement($users);
            $date_at = $carbon->subDay()->toDateTimeString();
            $limit_at = $limit->subDay()->toDateTimeString();
            $regency = $faker->randomElement($regencies);
            $prefix = $faker->randomElement($prefixes);
            $name = $prefix.title_case($regency);

    		$data[$i] = [
                'user_id' => $user_id,
    			'name' => $name,
                'slug' => str_slug($name).strtotime($date_at),
    			'target' => rand(1, 100) * 1000000,
    			'image' => 'donation-'.rand(1,10).'.jpg',
    			'description' => $lorem[0]."<img src='donation-".rand(1,10).".jpg'>".$lorem[1],
    			'limit' => $limit_at,
    			'status' => $faker->boolean(70),
                'created_at' => $date_at,
                'updated_at' => $date_at
    		];
        }

        // DB::statement('SET FOREIGN_KEY_CHECKS=0');        
        // DB::table('donations')->truncate();        
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('donations')->insert($data);
    }
}
