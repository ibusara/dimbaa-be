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
        Schema::create('post_match_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("center")->nullable();
            $table->string("date")->nullable();
            $table->string("email")->nullable();
            $table->string("final_result_team_a")->nullable();
            $table->string("final_result_team_b")->nullable();
            $table->string("game_by")->nullable();
            $table->string("mc_name")->nullable();
            $table->string("penalty_result_team_a")->nullable();
            $table->string("penaty_result_team_b")->nullable();
            $table->string("region")->nullable();
            $table->string("result_halftime_break_team_a")->nullable();
            $table->string("result_halftime_break_team_b")->nullable();
            $table->integer("stadium_id")->nullable();
            $table->string("team_a")->nullable();
            $table->string("team_b")->nullable();
            $table->string("telephone")->nullable();
            $table->string("time")->nullable();
            $table->string("whatsapp")->nullable();

            $table->integer("game_difficulty")->default(1);
            $table->date("remark_date")->nullable();
	        $table->string("remark")->nullable();
	        $table->string("sign")->nullable();
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
        Schema::dropIfExists('post_match_conditions');
    }
};
