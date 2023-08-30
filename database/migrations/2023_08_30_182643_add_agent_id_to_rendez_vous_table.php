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
        Schema::table('rendez_vous', function (Blueprint $table) {

            $table->unsignedBigInteger('agent_id');

            // Créer la relation avec la table users
            $table->foreign('agent_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendez_vous', function (Blueprint $table) {


            // Supprimer la contrainte de clé étrangère avant de supprimer la colonne
            $table->dropForeign(['agent_id']);

            // Supprimer la colonne
            $table->dropColumn('agent_id');
        });
    }
};
