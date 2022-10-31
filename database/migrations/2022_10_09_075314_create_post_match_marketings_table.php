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
        Schema::create('post_match_marketings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id')->nullable();
            // Post-MR Protection and Security
            $table->longText('ambulance')->nullable();
            $table->longText('cars')->nullable();
            $table->longText('entrance_doors')->nullable();
            $table->longText('exit_gate')->nullable();
            $table->longText('fire_rescure')->nullable();
            $table->longText('other_protection')->nullable();
            $table->longText('police')->nullable();
            $table->longText('special_protection')->nullable();
            // Post-MR News & Marketing
            $table->longText('accreditations')->nullable();
            $table->longText('banners_sponsor')->nullable();
            $table->longText('marketing_officer')->nullable();
            $table->longText('news_officer')->nullable();
            $table->longText('posters_tff_nbc')->nullable();
            $table->longText('press_service')->nullable();
            $table->longText('sign_age')->nullable();
            $table->longText('wanahabar_forum')->nullable();
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
        Schema::dropIfExists('post_match_marketings');
    }
};
