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
        Schema::create('properties', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description');

            $table->decimal('price', 12, 2);

            $table->string('type');

            $table->string('city');

            $table->string('address')->nullable();

            $table->integer('surface')->nullable();

            $table->integer('bedrooms')->default(0);

            $table->integer('bathrooms')->default(0);

            $table->enum('status', [
                'a_vendre',
                'a_louer'
            ]);

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
