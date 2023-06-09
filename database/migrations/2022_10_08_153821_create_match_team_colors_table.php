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
        Schema::create('match_team_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // Color
            $table->string("away_team_fp_jersey")->nullable();
            $table->string("away_team_fp_shorts")->nullable();
            $table->string( "away_team_fp_socks")->nullable();
            $table->string("away_team_gk_jersey")->nullable();
            $table->string("away_team_gk_shorts")->nullable();
            $table->string( "away_team_gk_socks")->nullable();
            $table->string("home_team_fp_jersey")->nullable();
            $table->string("home_team_fp_shorts")->nullable();
            $table->string( "home_team_fp_socks")->nullable();
            $table->string("home_team_gk_jersey")->nullable();
            $table->string("home_team_gk_shorts")->nullable();
            $table->string( "home_team_gk_socks")->nullable();

            // Description
            $table->string("one_description")->nullable();
            $table->string("one_possible_measure")->nullable();
            $table->string("two_description")->nullable();
            $table->string("two_possible_measure")->nullable();
            $table->string("three_description")->nullable();
            $table->string("three_possible_measure")->nullable();
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
        Schema::dropIfExists('match_team_colors');
    }
};
