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
        Schema::create('lineup_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id'); 
            $table->unsignedBigInteger('competition_id'); 
            $table->date('detail_date')->nullable();
            $table->integer('game_no')->nullable(); 

            $table->date('today_date')->nullable();
            $table->text('manager_signature')->nullable();
            $table->text('team_signature')->nullable();
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
        Schema::dropIfExists('lineup_forms');
    }
};
