<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void {
    Schema::create('transactions', function (Blueprint $table) {
        $table->id('transaction_id');
        $table->string('transaction_no', 50)->unique();
        $table->enum('type', ['Inbound', 'Outbound', 'Transfer', 'Adjustment']);
        $table->foreignId('warehouse_id')->constrained('warehouses', 'warehouse_id');
        $table->foreignId('item_id')->constrained('items', 'item_id');
        $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'supplier_id');
        $table->decimal('quantity', 10, 2);
        $table->decimal('unit_cost', 12, 2)->nullable();
        $table->decimal('total_cost', 14, 2)->nullable(); 
        $table->string('reference_no', 100)->nullable();
        $table->text('notes')->nullable();
        $table->foreignId('created_by')->constrained('users', 'id');
        $table->enum('status', ['Pending', 'Completed', 'Cancelled']);
        $table->timestamps();
    });
}
};
