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
        Schema::create('school_events', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('location');
            $table->double('price')->nullable();
            $table->timestampTz('maxPaymentTimestamptz')->nullable();
            $table->timestampTz('startTimestamptz');
            $table->timestampTz('endTimestamptz')->nullable();
            $table->enum('status', [
                'ativo',
                'cancelado',
                'em andamento',
                'finalizado'
            ]);
            $table->string('details')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_events');
    }
};
