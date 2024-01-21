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
        Schema::create('parts', function (Blueprint $table) {
            $table->uuid('id_parts')->primary();
            $table->uuid('id_unit');
            $table->foreign('id_unit')->references('id_unit')->on('units')->onDelete('cascade');
            $table->integer('scale');
            $table->text('description')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts');
    }
};
