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
        Schema::create('match_score_boards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id'); 
            $table->integer('team1_score')->default(0); 
            $table->integer('team2_score')->default(0); 
            $table->integer('point')->default(0);
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
        Schema::dropIfExists('match_score_boards');
    }
};
