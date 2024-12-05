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
        Schema::create('composers', function (Blueprint $table) {
            $table->id();
            $table->int('quantite');
            $table->double('prix')->nullable();
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composers');
    }
};
