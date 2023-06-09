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
        Schema::create('pre_match_colors', function (Blueprint $table) {
            $table->id();
            $table->string('away_team_fp_jersey', 100)->nullable()->default('text');
            $table->string('away_team_fp_shorts', 100)->nullable()->default('text');
            $table->string('away_team_fp_socks', 100)->nullable()->default('text');
            $table->string('away_team_gk_jersey', 100)->nullable()->default('text');
            $table->string('away_team_gk_shorts', 100)->nullable()->default('text');
            $table->string('away_team_gk_socks', 100)->nullable()->default('text');
            $table->string('home_team_fp_jersey', 100)->nullable()->default('text');
            $table->string('home_team_fp_shorts', 100)->nullable()->default('text');
            $table->string('home_team_fp_socks', 100)->nullable()->default('text');
            $table->string('home_team_gk_jersey', 100)->nullable()->default('text');
            $table->string('home_team_gk_shorts', 100)->nullable()->default('text');
            $table->string('home_team_gk_socks', 100)->nullable()->default('text');
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
        Schema::dropIfExists('pre_match_colors');
    }
};