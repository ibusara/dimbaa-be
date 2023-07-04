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
        Schema::create('apparels', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('match_id')->nullable();
            $table->unsignedInteger('home_team_id')->nullable();
            $table->unsignedInteger('away_team_id')->nullable();
            $table->string('home_socks_image')->nullable();
            $table->string('home_shirt_image')->nullable();
            $table->string('home_short_image')->nullable();
            $table->string('home_full_kit_image')->nullable();
            $table->string('home_color')->nullable();
            $table->string('away_shirt_image')->nullable();
            $table->string('away_full_kit_image')->nullable();
            $table->string('away_color')->nullable();
            $table->string('away_socks_image')->nullable();
            $table->string('away_short_image')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
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
        Schema::dropIfExists('apparels');
    }
};
