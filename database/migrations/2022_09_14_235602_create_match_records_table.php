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
        Schema::create('match_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tournament_id');
            $table->dateTime('date');
            $table->unsignedBigInteger('home_team_id')->nullable();
            $table->unsignedBigInteger('away_team_id')->nullable();
            $table->string('stadium_id')->nullable();
            $table->string('city')->nullable();
            $table->string('venue')->nullable();
            $table->string('round_type')->default('matchday')->nullable();
            $table->integer('round')->nullable();
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
        Schema::dropIfExists('match_records');
    }
};
