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
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            // Nome da prenda
            $table->string('name');
            // Valor previsto para a prenda
            $table->decimal('expected_value', 10, 2);
            //Pessoa associada à prenda
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // Valor efectivamente gasto
            $table->decimal('spent_value', 10, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};
