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
        Schema::create('pre_match_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('expected_stadium_attendance', 100);
            $table->string('flood_lights', 100);
            $table->string('match_balls', 100);
            $table->string('pitch_quality', 100);
            $table->string('security', 100);
            $table->string('stadium_preparation', 100);
            $table->string('weather', 100);
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
        Schema::dropIfExists('pre_match_conditions');
    }
};