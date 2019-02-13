<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('chairman');
            $table->string('address');
            $table->char('village_id', 10)->nullable();
            $table->char('district_id', 7)->nullable();
            $table->char('regency_id', 4)->nullable();
            $table->char('province_id', 2)->nullable();
            $table->string('email', 50)->unique();
            $table->string('phone', 14)->nullable()->unique();
            $table->string('account_number', 20)->nullable()->unique();
            $table->text('profile')->nullable();
            $table->string('logo')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
}
