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
        Schema::create('producto_facturas', function (Blueprint $table) {
            $table->id();

            $table->float('cantidad');

            $table->float('precio');
            $table->float('total');

            $table->foreignId('factura_id')
            ->nullable()
            ->constrained('faturas')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('producto_id')
            ->nullable()
            ->constrained('productos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('estado_id')
            ->nullable()
            ->constrained('estados')
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
        Schema::dropIfExists('producto_facturas');
    }
};
