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
        Schema::create('pre_match_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('match_id')->constrained('match_records', 'id');
            $table->foreignId('away_team')->constrained('teams', 'id');
            $table->string('home_team')->constrained('teams', 'id');
            $table->string('kick_off_time', 100);
            $table->string('city', 100);
            $table->string('competition', 100);
            $table->string('match_commissionar', 100);
            $table->string('match_date', 100);
            $table->string('stadium', 100);
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
        Schema::dropIfExists('pre_match_reports');
    }
};