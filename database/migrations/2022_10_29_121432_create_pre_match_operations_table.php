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
        Schema::create('pre_match_operations', function (Blueprint $table) {
            $table->id();
            $table->string('cs_email', 100);
            $table->string('cs_mobile', 100);
            $table->string('cs_name', 100);
            $table->string('gc_email', 100);
            $table->string('gc_mobile', 100);
            $table->string('gc_name', 100);
            $table->string('md_email', 100);
            $table->string('md_mobile', 100);
            $table->string('md_name', 100);
            $table->string('mo_email', 100);
            $table->string('mo_mobile', 100);
            $table->string('mo_name', 100);
            $table->string('ra_email', 100);
            $table->string('ra_mobile', 100);
            $table->string('ra_name', 100);
            $table->string('so_email', 100);
            $table->string('so_mobile', 100);
            $table->string('so_name', 100);
            $table->string('ta_email', 100);
            $table->string('ta_mobile', 100);
            $table->string('ta_name', 100);
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
        Schema::dropIfExists('pre_match_operations');
    }
};