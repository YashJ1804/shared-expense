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
        Schema::create('expenses', function (Blueprint $table) {
    $table->id();

    $table->foreignId('group_id')
        ->constrained()
        ->onDelete('cascade');

    $table->string('title');

    $table->text('description')->nullable();

    $table->decimal('amount', 12, 2);

    $table->string('currency')
        ->default('INR');

    $table->date('expense_date');

    $table->foreignId('paid_by')
        ->constrained('users');

    $table->enum('split_type', [
        'equal',
        'percentage',
        'exact'
    ]);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
