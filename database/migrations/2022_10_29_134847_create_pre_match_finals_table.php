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
        Schema::create('pre_match_finals', function (Blueprint $table) {
            $table->id();
            $table->string('additional_remarks', 100);
            $table->string('email', 100);
            $table->string('mobile', 100);
            $table->string('signature', 100);
            $table->string('whatsapp', 100);
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
        Schema::dropIfExists('pre_match_finals');
    }
};