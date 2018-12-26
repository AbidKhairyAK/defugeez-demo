<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImportIndonesiaAreaTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (
            !Schema::hasTable('province') || 
            !Schema::hasTable('regencies') || 
            !Schema::hasTable('districts') || 
            !Schema::hasTable('villages')) 
        {
            $sql = public_path('sql/indonesia.sql');
            DB::unprepared(file_get_contents($sql));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('regencies');
        Schema::dropIfExists('provinces');
    }

}
