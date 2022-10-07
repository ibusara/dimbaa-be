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
        Schema::create('match_cordination_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean("incident_during_team_check")->nullable();
            $table->text("incident_reason")->nullable();
            $table->boolean("pitch_condition")->nullable();
            $table->text("dressing_room_condition" )->nullable();

            $table->boolean("stretcher_available")->nullable();
            $table->boolean("ambulance_available")->nullable();
            $table->integer("no_of_stretcher")->nullable();
            $table->integer("no_of_ambulance")->nullable();

            $table->boolean("information")->nullable();
            $table->boolean("announcer")->nullable();
            $table->boolean("giant_screen")->nullable();

            $table->text("incident" )->nullable();
            $table->text("remarks" )->nullable();
            $table->string("name" )->nullable();
            $table->date("date" )->nullable();

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
        Schema::dropIfExists('match_cordination_details');
    }
};
