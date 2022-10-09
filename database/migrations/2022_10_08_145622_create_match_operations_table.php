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
        Schema::create('match_operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->string("cs_email")->nullable();
            $table->string("cs_mobile")->nullable();
            $table->string("cs_name")->nullable();
            $table->string("gc_email")->nullable();
            $table->string("gc_mobile")->nullable();
            $table->string("gc_name")->nullable();
            $table->string("md_email")->nullable();
            $table->string("md_mobile")->nullable();
            $table->string("md_name")->nullable();
            $table->string("mo_email")->nullable();
            $table->string("mo_mobile")->nullable();
            $table->string("mo_name")->nullable();
            $table->string("ra_email")->nullable();
            $table->string("ra_mobile")->nullable();
            $table->string("ra_name")->nullable();
            $table->string("so_email")->nullable();
            $table->string("so_mobile")->nullable();
            $table->string("so_name")->nullable();
            $table->string("ta_email")->nullable();
            $table->string("ta_mobile")->nullable();
            $table->string("ta_name")->nullable();

            $table->string("center_supervisor")->nullable();
            $table->string("fa_r")->nullable();
            $table->string("home_team")->nullable();
            $table->string("operation_team")->nullable();
            $table->string("referees")->nullable();
            $table->string("security_authorities")->nullable();
            $table->string("stadium_management")->nullable();
            $table->string("visiting_team")->nullable();
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
        Schema::dropIfExists('match_operations');
    }
};
