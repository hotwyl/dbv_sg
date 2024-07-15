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
        Schema::create('Clubes', function (Blueprint $table) {
            $table->id('id_clube');
            $table->string('divisao', 50)->index()->default('Sul-Americana');
            $table->string('uniao', 50)->index()->default('União Sul-Brasileira');
            $table->string('associacao', 50)->index()->default('Sul Paranaense');
            $table->integer('area')->nullable()->default(2)->index();
            $table->integer('regiao')->nullable()->index()->default(4);
            $table->string('distrito', 50)->index();
            $table->string('igreja', 100)->index();
            $table->string('nome', 100)->index();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clubes');
    }
};
