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
    // {"marks_score": "4",
	// "points_to_improve": "5",
	// "strong_points": "6",
	// "total_marks": "2" }
    public function up()
    {
        Schema::create('post_match_referrings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // Post-MR Protection and Security
            $table->longText('personality')->nullable();
            $table->longText('fitness')->nullable();
            $table->longText('laws')->nullable();
            $table->longText('duties')->nullable();
            $table->longText('discipline')->nullable();

            $table->longText('first_assistant_referee_personality')->nullable();
            $table->longText('first_assistant_referee_position')->nullable();
            $table->longText('first_assistant_referee_signals')->nullable();
            $table->longText('first_assistant_referee_matchcontrol')->nullable();
            $table->longText('first_assistant_referee_teamwork')->nullable();

            $table->longText('second_assistant_referee_personality')->nullable();
            $table->longText('second_assistant_referee_position')->nullable();
            $table->longText('second_assistant_referee_signals')->nullable();
            $table->longText('second_assistant_referee_matchcontrol')->nullable();
            $table->longText('second_assistant_referee_teamwork')->nullable();
            $table->longText('second_assistant_referee_personality')->nullable();
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
        Schema::dropIfExists('post_match_referrings');
    }
};
