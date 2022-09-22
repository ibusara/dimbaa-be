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
        Schema::create('match_officials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('head_referee_id')->nullable();
            $table->unsignedBigInteger('referee_id')->nullable();
            $table->unsignedBigInteger('match_officer_id')->nullable();
            $table->unsignedBigInteger('commissioner_id')->nullable();
            $table->unsignedBigInteger('other_id')->nullable();
            $table->unsignedBigInteger('other2_id')->nullable();
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
        Schema::dropIfExists('match_officials');
    }
};
