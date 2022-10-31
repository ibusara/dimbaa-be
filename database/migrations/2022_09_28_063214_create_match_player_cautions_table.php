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
        Schema::create('match_player_cautions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refree_id')->nullable();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('team_id');
            $table->string('minute');
            $table->text('reasons')->nullable();
            $table->integer('warning_card')->default(1)->nullable();//Caution, Expulsion
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
        Schema::dropIfExists('match_player_cautions');
    }
};
