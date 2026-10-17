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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('stat_properties')->nullable()->default('120+');
            $table->string('stat_projects')->nullable()->default('80+');
            $table->string('stat_clients')->nullable()->default('300+');
            $table->string('stat_experience')->nullable()->default('10+');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'stat_properties',
                'stat_projects',
                'stat_clients',
                'stat_experience',
            ]);
        });
    }
};
