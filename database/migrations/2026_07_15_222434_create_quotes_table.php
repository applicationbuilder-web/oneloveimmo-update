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
        Schema::create('quotes', function (Blueprint $table) {

            $table->id();

            $table->string('fullname');

            $table->string('phone');

            $table->string('email')->nullable();

            $table->string('city');

            $table->string('project_type');

            $table->decimal('budget', 15, 2)->nullable();

            $table->text('message');

            $table->string('attachment')->nullable();

            $table->enum('status', [
                'nouveau',
                'en_cours',
                'traite'
            ])->default('nouveau');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
