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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('logo')->nullable();
            $table->string('address');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('telephone');
            $table->json('horaires')->nullable();
            $table->decimal('note_moyenne', 10, 2)->default(0);
            $table->enum('status', ['en_attente', 'actif','suspendu'])->default('en_attente')->index();
            $table->enum('plan_abonnement', ['gratuit', 'standard','premium'])->default('gratuit')->index();
            $table->decimal('commission_taux', 5, 2)->default(15.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
