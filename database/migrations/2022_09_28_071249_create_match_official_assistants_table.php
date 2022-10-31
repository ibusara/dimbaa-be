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
        Schema::create('match_official_assistants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('center_supervisor')->nullable();
            $table->longText('commissioner')->nullable();
            $table->longText('district')->nullable();
            $table->longText('email')->nullable();
            $table->longText('full_name')->nullable();
            $table->longText('game_no_other')->nullable();
            $table->longText('game_no_tpl')->nullable();
            $table->longText('match_payment')->nullable();
            $table->longText('referee_assessor')->nullable();
            $table->longText('referee_reg_no')->nullable();
            $table->longText('region')->nullable();
            $table->longText('tel_number')->nullable();
            $table->timestamps();
        });
    }
    // "center_supervisor": "["val" => "abc", "region" => "def"]",
    // "commissioner": "["val" => "abc", "region" => "def"]",
    // "district": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "email": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "full_name": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "game_no_other": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "game_no_tpl": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "match_payment": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "referee_assessor": "["val" => "abc", "region" => "def"]",
    // "referee_reg_no": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "region": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]",
    // "tel_number": "["assistant_1" => "abc", "assistant_2" => "def", "reserve_referee" => "abc"]"
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_official_assistants');
    }
};
