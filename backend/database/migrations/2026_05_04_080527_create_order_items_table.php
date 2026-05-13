<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // relation vers la commande
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');

            // relation vers le produit
            $table->foreignId('product_id')
                ->constrained()
                ->onDelete('cascade');

            // quantité commandée
            $table->integer('quantite')->default(1);

            // prix unitaire au moment de la commande (important pour historique)
            $table->decimal('prix_unitaire', 10, 2);

            // note spéciale client (ex: sans oignon, plus épicé, etc.)
            $table->text('note_specifique')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};