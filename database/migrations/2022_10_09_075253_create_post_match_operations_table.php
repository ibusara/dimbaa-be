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
        Schema::create('post_match_operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // Post-MR Field Condition & Facilities
            $table->longText('balls_center')->nullable();
            $table->longText('corner_flags')->nullable();
            $table->longText('dressing_room')->nullable();
            $table->longText('flag_team_entry')->nullable();
            $table->longText('flood_lights')->nullable();
            $table->longText('goals_and_net')->nullable();
            $table->longText('indoor_fence')->nullable();
            $table->longText('pitch')->nullable();
            $table->longText('score_board')->nullable();
            $table->longText('technical_benches')->nullable();
            // Post-MR Game Operation
            $table->longText('communication')->nullable();
            $table->longText('fa_m')->nullable();
            $table->longText('gc')->nullable();
            $table->longText('guest_of_honour')->nullable();
            $table->longText('kick_off_on_time')->nullable();
            $table->longText('pre_match_cermony')->nullable();
            $table->longText('schedule_count_down')->nullable();
            $table->longText('vvip_vip')->nullable();
            // Post-MR TREATMENT
            $table->longText('ambulance')->nullable();
            $table->longText('first_aid')->nullable();
            $table->longText('game_door')->nullable();
            $table->longText('guest_of_honour')->nullable();
            $table->longText('referral_hospital')->nullable();
            $table->longText('pre_match_cermony')->nullable();
            $table->longText('treatment_room')->nullable();
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
        Schema::dropIfExists('post_match_operations');
    }
};
