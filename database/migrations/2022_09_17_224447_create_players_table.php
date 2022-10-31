<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->string('first_name', 100);
            $table->string('middle_name', 100);
            $table->string('last_name', 100);
            $table->integer('local_id')->nullable();
            $table->integer('fifa_id')->nullable();
            $table->integer('jersey_number')->nullable();
            $table->string('playing_position', 100);
            $table->string('weight', 100);
            $table->string('height', 100);
            $table->string('nationality', 100);
            $table->date('dob')->nullable();
            $table->date('professional_date');
            $table->string('signature', 100);
            $table->string('license_no', 100)->nullable();
            $table->string('rank', 100)->nullable();
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
        Schema::dropIfExists('players');
    }
};
