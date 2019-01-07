<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateAllTable::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RefugeesTableSeeder::class);
        $this->call(DemandsTableSeeder::class);
    }
}
