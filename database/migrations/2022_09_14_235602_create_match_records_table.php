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
            $table->dateTime('period');
            $table->string('home_team')->nulluable();
            $table->string('away_team')->nulluable();
            $table->string('city')->nulluable();
            $table->string('stadium')->nulluable();
            $table->integer('round')->default(1);
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
