<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->integer('team_sh');
            $table->integer('mission_sh');
            $table->integer('about_sh');
            $table->integer('wwd_sh');
            $table->integer('blog_sh');
            $table->integer('opening_sh');
            $table->integer('menu_sh');
            $table->integer('retail_menu_sh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
