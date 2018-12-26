<?php

use Illuminate\Database\Seeder;

class TruncateAllTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$tables = DB::select('SHOW TABLES');
        $tables = array_map('current', $tables);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $name) {
        	if (
        		$name == 'migrations' ||
        		$name == 'provinces' ||
        		$name == 'regencies' ||
        		$name == 'districts' ||
        		$name == 'villages'
        	) {
		        continue;
		    }
        	DB::table($name)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // array_map('unlink', glob(public_path('img/profile/*')));
    }
}
