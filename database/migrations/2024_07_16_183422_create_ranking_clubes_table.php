<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ranking_clubes', function (Blueprint $table) {
            $table->id('id_ranking_clube');
            $table->unsignedBigInteger('id_avaliacao');
            $table->unsignedBigInteger('id_avaliador');
            $table->unsignedBigInteger('id_clube');
            $table->integer('pontuacao');
            $table->dateTime('data_hora')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('id_avaliacao')->references('id_avaliacao')->on('avaliacoes')->onDelete('cascade');
            $table->foreign('id_avaliador')->references('id_avaliador')->on('avaliadores')->onDelete('cascade');
            $table->foreign('id_clube')->references('id_clube')->on('clubes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranking_clubes');
    }
};
