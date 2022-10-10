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
        Schema::create('cordinator_match_officials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text("referee")->nullable();
            $table->text("assistant_referee_one" )->nullable();
            $table->text("assistant_referee_two")->nullable();
            $table->text("fourth_official")->nullable();
            $table->text("commissionar")->nullable();
            $table->text("match_doctor")->nullable();
            $table->text("officer_for_marketing")->nullable();
            $table->text("media_officer")->nullable();
            $table->text("security_officer")->nullable();
            $table->text("general_coordinator")->nullable();
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
        Schema::dropIfExists('cordinator_match_officials');
    }
};
