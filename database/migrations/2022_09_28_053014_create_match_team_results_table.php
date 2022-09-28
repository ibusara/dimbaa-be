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
        Schema::create('match_team_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id'); 
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->text('halftime_score')->nullable();
            $table->text('final_score')->nullable(); 
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
        Schema::dropIfExists('match_team_results');
    }
};
