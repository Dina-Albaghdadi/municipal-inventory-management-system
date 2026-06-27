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
    Schema::create('po_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('po_id')->constrained('purchase_orders', 'po_id')->onDelete('cascade');
        $table->foreignId('item_id')->constrained('items', 'item_id');
        $table->decimal('quantity', 10, 2);
        $table->decimal('unit_price', 12, 2);
        $table->decimal('received_qty', 10, 2)->default(0);
        $table->text('notes')->nullable();
    });
}
};
