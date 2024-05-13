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
        Schema::create('chatmessages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->boolean('read')->default(false);

            $table->unsignedBigInteger('id_send'); 
            $table->unsignedBigInteger('id_receive'); 

            $table->foreign('id_send')->references('id')->on('users');
            $table->foreign('id_receive')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatmessages');
    }
};
