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
        Schema::create('estado_de_facturas', function (Blueprint $table) {
            $table->id();
            $table->string('estado');

            $table->foreignId('factura_id')
            ->nullable()
            ->constrained('faturas')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 

             
            $table->foreignId('usuario_id')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_de_facturas');
    }
};
