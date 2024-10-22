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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id'); // ID du paiement (PayPal ou Stripe)
            $table->string('user_id'); // ID de l'utilisateur
            $table->decimal('amount', 10, 2); // Montant du paiement
            $table->string('currency'); // Devise
            $table->string('status'); // Statut du paiement (success, canceled, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
