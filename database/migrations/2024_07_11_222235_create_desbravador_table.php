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
        Schema::create('desbravadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_unidade');
            $table->string('nome', 100)->index();
            $table->unsignedBigInteger('id_cargo');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_unidade')->references('id')->on('unidades')->onDelete('cascade');
            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desbravadores');
    }
};
