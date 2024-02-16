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
        Schema::create('monumentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('provincia')->constrained('provincias')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('aforo');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monumentos');
    }
};
