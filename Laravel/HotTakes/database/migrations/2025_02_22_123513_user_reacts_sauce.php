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
        Schema::create('user_reacts_sauce', function (Blueprint $table) {
            $table->string('userId');
            $table->unsignedBigInteger('sauceId');

            // Clé primaire
            $table->primary(['userId', 'sauceId']);

            // Clés étrangères
            $table->foreign('userId')->references('idUtilisateur')->on('user');
            $table->foreign('sauceId')->references('idSauce')->on('sauce');

            $table->boolean('reacted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_reacts_sauce');
    }
};
