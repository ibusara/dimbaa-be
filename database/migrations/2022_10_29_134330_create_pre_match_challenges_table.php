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
        Schema::create('pre_match_challenges', function (Blueprint $table) {
            $table->id();
            $table->string('one_description', 100);
            $table->string('one_possible_measure', 100);
            $table->string('three_description', 100);
            $table->string('three_possible_measure', 100);
            $table->string('two_description', 100);
            $table->string('two_possible_measure', 100);
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
        Schema::dropIfExists('pre_match_challenges');
    }
};
