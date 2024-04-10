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
        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enterprise_id');

            $table->string('phase')->nullable(); 
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('prix_phase')->nullable();
            $table->string('statut_phase')->nullable();  
            $table->integer('prix_action')->nullable();
            $table->integer('nombre_action')->nullable(); 

            $table->index(["enterprise_id"], "fk_enterprise_user");
            $table->foreign('enterprise_id')->references('id')->on('enterprises');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phases');
    }
};
