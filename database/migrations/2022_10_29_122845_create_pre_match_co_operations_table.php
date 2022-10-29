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
        Schema::create('pre_match_co_operations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('center_supervisor', 100);
            $table->string('fa_r', 100);
            $table->string('home_team', 100);
            $table->string('operation_team', 100);
            $table->string('referees', 100);
            $table->string('security_authorities', 100);
            $table->string('stadium_management', 100);
            $table->string('visiting_team', 100);
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
        Schema::dropIfExists('pre_match_co_operations');
    }
};