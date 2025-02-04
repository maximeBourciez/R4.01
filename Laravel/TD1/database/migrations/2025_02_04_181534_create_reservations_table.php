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
        Schema::create('reservations', function (Blueprint $table) {
            // Attributs
            $table->id("codeReservation");
            $table->string("dateReservation");
            $table->string("dateAller");
            $table->string("dateRetour");

            // Clés étrangères
            $table->foreignId("NumeroClient")->constrained("clients")->references("NumeroClient")->on("clients");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
