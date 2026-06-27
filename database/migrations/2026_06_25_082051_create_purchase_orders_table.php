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
    Schema::create('purchase_orders', function (Blueprint $table) {
        $table->id('po_id');
        $table->string('po_number', 50)->unique();
        $table->foreignId('supplier_id')->constrained('suppliers', 'supplier_id');
        $table->dateTime('order_date');
        $table->dateTime('expected_date')->nullable();
        $table->enum('status', ['Draft', 'Ordered', 'Partial', 'Received', 'Cancelled']);
        $table->decimal('total_amount', 14, 2)->default(0);
        $table->foreignId('created_by')->constrained('users', 'id');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
};
