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
        Schema::table('players', function (Blueprint $table) {
            $table->string('space')->nullable();
            $table->text('signature')->nullable();
            $table->string('license_no')->nullable();
            $table->string('position')->nullable();
            $table->integer('rank')->default(1); //1. Senior Players, 2. Team Leaders, 3. Beginner players, 4. Reserve Players
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumne(['space', 'signature', 'license_no', 'rank', 'position'])
        });
    }
};
