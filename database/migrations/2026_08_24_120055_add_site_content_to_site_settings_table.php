<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            // Images
            $table->string('construction_image')->nullable();
            $table->string('about_image')->nullable();

            $table->string('project_image_1')->nullable();
            $table->string('project_image_2')->nullable();
            $table->string('project_image_3')->nullable();

            // Informations de contact
            $table->string('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();

            // Réseaux sociaux
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('whatsapp_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'construction_image',
                'about_image',
                'project_image_1',
                'project_image_2',
                'project_image_3',
                'contact_address',
                'contact_phone',
                'contact_email',
                'facebook_url',
                'instagram_url',
                'linkedin_url',
                'whatsapp_url',
            ]);
        });
    }
};