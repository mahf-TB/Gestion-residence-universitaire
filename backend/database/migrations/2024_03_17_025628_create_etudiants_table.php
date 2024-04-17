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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule',10)->unique()->nullable();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('sexe',2)->nullable();
            $table->string('cin',14)->unique()->nullable();
            $table->string('telephone',20)->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_logement')->nullable();
            $table->foreign('id_logement')->references('id')->on('logements')->onDelete('set null')->onUpdate('set null');
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
