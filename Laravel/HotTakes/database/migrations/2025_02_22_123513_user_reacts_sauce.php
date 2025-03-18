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
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('sauceId');

            // Clé primaire
            $table->primary(['userId', 'sauceId']);

            // Clés étrangères
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('sauceId')->references('idSauce')->on('sauces');

            $table->boolean('reaction')->nullable();
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
