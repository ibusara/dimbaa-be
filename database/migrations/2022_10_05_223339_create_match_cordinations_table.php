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
        Schema::create('match_cordinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean("match_coordination_meeting")->nullable();
            $table->date("meeting_date" )->nullable();
            $table->text("if_no_meeting")->nullable();
            $table->text("comment")->nullable();

            $table->boolean("tff_flag_raised")->nullable();
            $table->text("tff_on_the_pole")->nullable();
            $table->text("play_fair_flag_raised")->nullable();
            $table->text("pff_on_the_pole")->nullable();

            $table->boolean("position_benches_respected_both_teams")->nullable();
            $table->text("not_respected_reason")->nullable();
            $table->integer("performance_flag_bearers")->nullable();
            $table->integer("performance_ball_boys")->nullable();
            $table->integer("performance_team_escorts")->nullable();
            $table->integer("teams_behaviour")->nullable();
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
        Schema::dropIfExists('match_cordinations');
    }
};
