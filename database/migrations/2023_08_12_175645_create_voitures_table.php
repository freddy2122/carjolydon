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
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->integer('annee');
            $table->string('modele');
            $table->string('prix');
            $table->text('description');
            $table->unsignedBigInteger('carrosserie_id');
            $table->unsignedBigInteger('transmission_id');
            $table->unsignedBigInteger('carburant_id');
            // ... autres colonnes

            $table->timestamps();

            // Clés étrangères
            $table->foreign('carrosserie_id')->references('id')->on('carrosseries');
            $table->foreign('transmission_id')->references('id')->on('transmissions');
            $table->foreign('carburant_id')->references('id')->on('carburants');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
