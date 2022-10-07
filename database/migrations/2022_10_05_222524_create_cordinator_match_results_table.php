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
        Schema::create('cordinator_match_results', function (Blueprint $table) {
            $table->id();
            // "penalty":['team_a' => 'teama', 'team_b' => 'teamb', 'favour_of' => 'teama'],
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('final_score')->nullable();
            $table->text('extra_time_score')->nullable();
            $table->text('penalty')->nullable();
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
        Schema::dropIfExists('cordinator_match_results');
    }
};
