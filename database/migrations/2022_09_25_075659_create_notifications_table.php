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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->string('action')->nullable();
            $table->string('title')->nullable();
            $table->string('message')->nullable();
            $table->boolean('seen')->default(0); 
            $table->string('category')->default('primary');
            $table->dateTime('sent_at')->nullable()->default(now());
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
        Schema::dropIfExists('notifications');
    }
};
