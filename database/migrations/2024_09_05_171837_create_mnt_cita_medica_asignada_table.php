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
        Schema::create('mnt_cita_medica_asignada', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_paciente')->constrained('mnt_paciente');
            $table->foreignId('id_doctor')->constrained('mnt_doctor');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_cita_medica_asignada');
    }
};
