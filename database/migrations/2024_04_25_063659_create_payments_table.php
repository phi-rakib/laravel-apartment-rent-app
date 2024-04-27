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
            $table->foreignId('rental_agreement_id')->constrained()->onDelete('cascade');
            $table->year('billing_year');
            $table->string('billing_month');
            $table->decimal('gas_bill', 10, 2);
            $table->integer('total_unit');
            $table->decimal('electricity_bill', 10, 2);
            $table->decimal('rent', 10, 2);
            $table->decimal('total', 10, 2);
            $table->dateTime('paid_at');
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
