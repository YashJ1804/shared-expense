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
        Schema::create('settlements', function (Blueprint $table) {
    $table->id();

    $table->foreignId('group_id')
        ->constrained()
        ->onDelete('cascade');

    $table->foreignId('payer_id')
        ->constrained('users');

    $table->foreignId('receiver_id')
        ->constrained('users');

    $table->decimal('amount', 12, 2);

    $table->date('settlement_date');

    $table->text('notes')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
