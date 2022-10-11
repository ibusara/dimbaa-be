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
        Schema::table('match_officials', function (Blueprint $table) {
            $table->text('detail')->nullable();
            $table->integer('count_down_respected_teams')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('match_officials', function (Blueprint $table) {
            $table->dropColumn(['detail', 'count_down_respected_teams']);
        });
    }
};
