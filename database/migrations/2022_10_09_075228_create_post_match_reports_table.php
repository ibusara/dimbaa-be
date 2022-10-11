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
        Schema::create('post_match_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text("team1_goals")->nullable();
            $table->text("team2_goals")->nullable();
            $table->longText('team1_substitutions')->nullable();
            $table->longText('team2_substitutions')->nullable();
            $table->text('team1_starting')->nullable();
            $table->text('team2_starting')->nullable(); 
            $table->text('team1_behaviour')->nullable();
            $table->text('team2_behaviour')->nullable();

            $table->integer("bix")->nullable();
            $table->text("man_of_the_match")->nullable();
            $table->integer("ratio")->nullable();
            $table->integer("total_no_of_spectators")->nullable();
            $table->integer("totla_revenue_collected")->nullable();
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
        Schema::dropIfExists('post_match_reports');
    }
};
