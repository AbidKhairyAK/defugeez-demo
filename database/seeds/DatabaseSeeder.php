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
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(OrganizationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RefugeesTableSeeder::class);
        $this->call(DemandsTableSeeder::class);
        $this->call(DonationsTableSeeder::class);
        $this->call(TransfersTableSeeder::class);
        $this->call(ProofsTableSeeder::class);
    }
}