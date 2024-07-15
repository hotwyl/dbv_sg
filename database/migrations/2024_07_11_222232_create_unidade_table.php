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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id('id_unidade');
            $table->unsignedBigInteger('id_clube');
            $table->string('nome', 100)->index();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('id_clube')->references('id_clube')->on('Clubes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
