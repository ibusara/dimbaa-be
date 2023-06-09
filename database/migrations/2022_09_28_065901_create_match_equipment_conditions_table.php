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
        Schema::create('match_equipment_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('ambulance')->nullable();
            $table->longText('ball_boys')->nullable();
            $table->longText('corner_flags')->nullable();
            $table->longText('dressing_room')->nullable();
            $table->longText('entrance')->nullable();
            $table->longText('exterior_fence')->nullable();
            $table->longText('field_marks')->nullable();
            $table->longText('goals')->nullable();

            $table->longText('ist_aid')->nullable();
            $table->longText('journalists')->nullable();
            $table->longText('nets')->nullable();
            $table->longText('official_guest')->nullable();
            $table->longText('pitch')->nullable();
            $table->longText('platform')->nullable();
            $table->longText('police')->nullable();
            $table->longText('protection_stewards')->nullable();
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
        Schema::dropIfExists('match_equipment_conditions');
    }
};
