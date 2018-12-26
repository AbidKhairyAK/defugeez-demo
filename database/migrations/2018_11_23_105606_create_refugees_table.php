<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefugeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refugees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('event_id');
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->string('origin')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('health', [1,2,3,4]);
            $table->enum('status', [1,2,3,4])->default(1);
            $table->enum('blood_type', ['A', 'B', 'AB', 'O'])->nullable();
            $table->integer('barrack');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('refugees');
    }
}
