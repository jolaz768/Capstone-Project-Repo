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
        Schema::create('fabric_garments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fabric_id')->constrained('fabrics')->onDelete('cascade');
            $table->foreignId('garment_id')->constrained('garments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fabric_garments');
    }
};
