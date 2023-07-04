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
        Schema::create('referring_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('referee')->nullable();
            $table->text('ass_referee_1')->nullable();
            $table->text('ass_referee_2')->nullable();
            $table->text('fourth_official')->nullable();
            $table->text('add_referee_one')->nullable();
            $table->text('add_referee_two')->nullable();
            $table->text('additional_assistant_referee_1')->nullable();
            $table->text('additional_assistant_referee_2')->nullable();
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
        Schema::dropIfExists('referring_teams');
    }
};
