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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            
            $table->string('siren')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('name_enterprise');
            $table->string('address')->nullable(); 
            $table->string('livres')->nullable();
            $table->string('politique')->nullable(); 
            $table->integer('prix_action')->nullable();
            $table->integer('nombre_action')->nullable(); 
            $table->string('objectif')->nullable();
            $table->integer('montant_actuel')->nullable();
            $table->string('web_site')->nullable();
            $table->string('description')->nullable();
            $table->enum('state', ['ACTIF', 'INACTIF'])->default('INACTIF');
 
            $table->index(["user_id"], "fk_user_enterprise");

            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
