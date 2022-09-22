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
            $table->unsignedBigInteger('home_team_id')->nulluable();
            $table->unsignedBigInteger('away_team')->nulluable();
            $table->string('stadium_id')->nulluable();
            $table->string('city')->nulluable();
            $table->string('venue')->nulluable();
            $table->string('round');
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
