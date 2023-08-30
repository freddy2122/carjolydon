<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    public function up()
    {
        Schema::create('rendez_vous', function (Blueprint $table) {
            $table->id();
            $table->string('client_nom');
            $table->string('client_prenom');
            $table->dateTime('date');
            $table->string('lieu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rendez_vous');
    }
}

