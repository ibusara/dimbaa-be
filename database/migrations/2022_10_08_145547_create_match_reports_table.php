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
        Schema::create('match_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->integer('expected_stadium_attendance')->default(0);
            $table->string('flood_lights')->nullable();
            $table->integer('match_balls')->nullable();
            $table->string('pitch_quality')->nullable();
            $table->string('security')->nullable();
            $table->string('stadium_preparation')->nullable();
            $table->string('weather')->nullable();

            $table->string('issue_one')->nullable();
            $table->string('issue_two')->nullable();
            $table->string('issue_three')->nullable();
            $table->string('additional_remarks')->nullable();
            $table->string('emails')->nullable();
            $table->string('mobile')->nullable();
            $table->string('signature')->nullable();
            $table->string('whatsapp')->nullable();
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
        Schema::dropIfExists('match_reports');
    }
};
