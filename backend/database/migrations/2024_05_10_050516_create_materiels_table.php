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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->integer('qte')->default(1);
            $table->string('image')->nullable();

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('logement_id'); 
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('logement_id')->references('id')->on('logements');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
