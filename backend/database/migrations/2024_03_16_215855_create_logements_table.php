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
        Schema::create('logements', function (Blueprint $table) {
            $table->id();
            $table->string('num_logement',10);
            $table->string('type_logement');
            $table->double('prix');
            $table->string('status',50);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('id_batiment');
            $table->foreign('id_batiment')->references('id')->on('batiments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logements');
    }
};
