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
        Schema::create('sauce', function (Blueprint $table) {
            $table->id("idSauce");
            $table->string('userId');
            $table->string('name');
            $table->string('manufacturer');
            $table->text('description');
            $table->string('mainPepper');
            $table->string('imageUrl');
            $table->integer('heat');
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->json('usersLiked')->nullable();
            $table->json('usersDisliked')->nullable();

            // Clé étrangère
            $table->foreign('userId')->references('idUtilisateur')->on('utilisateur');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauce');
    }
};
