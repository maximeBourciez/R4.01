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
        Schema::create('dossier_locations', function (Blueprint $table) {
            // Attributs
            $table->id("numeroDossier");
            $table->boolean("estPaye");

            // Clés étrangères
            $table->foreignId("codeReservation")->constrained("reservations")->references("codeReservation")->on("reservations");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_locations');
    }
};
