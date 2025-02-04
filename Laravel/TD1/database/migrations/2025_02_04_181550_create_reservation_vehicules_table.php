<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_vehicules', function (Blueprint $table) {
            // Clés étrangères
            $table->foreignId('reservation_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicule_id')->constrained()->onDelete('cascade');

            // Clé primaire
            $table->primary(['reservation_id', 'vehicule_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_vehicules');
    }
};
