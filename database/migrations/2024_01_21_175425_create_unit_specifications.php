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
        Schema::create('unit_specifications', function (Blueprint $table) {
            $table->uuid('id_unit_specification')->primary();
            $table->uuid('id_unit');
            $table->foreign('id_unit')->references('id_unit')->on('units')->onDelete('cascade');
            $table->string('type');
            $table->string('specification');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_specifications');
    }
};
