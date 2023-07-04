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
        Schema::create('post_match_officials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("cm_mobile")->nullable();
            $table->string("cm_name")->nullable();
            $table->string("cm_region")->nullable();
            $table->string("md_mobile")->nullable();
            $table->string("md_name")->nullable();
            $table->string("md_region")->nullable();
            $table->string("mo_mobile")->nullable();
            $table->string("mo_moble")->nullable();
            $table->string("mo_name")->nullable();
            $table->string("mo_region")->nullable();
            $table->string("referee_assist_one_mobile")->nullable();
            $table->string("referee_assist_one_name")->nullable();
            $table->string("referee_assist_one_region")->nullable();
            $table->string("referee_assist_two_mobile")->nullable();
            $table->string("referee_assist_two_name")->nullable();
            $table->string("referee_assist_two_region")->nullable();
            $table->string("referee_mobile")->nullable();
            $table->string("referee_name")->nullable();
            $table->string("referee_region")->nullable();
            $table->string("reserve_referee_mobile")->nullable();
            $table->string("reserve_referee_name")->nullable();
            $table->string("reserve_referee_region")->nullable();
            $table->string("sa_mobile")->nullable();
            $table->string("sa_name")->nullable();
            $table->string("sa_region")->nullable();
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
        Schema::dropIfExists('post_match_officials');
    }
};
