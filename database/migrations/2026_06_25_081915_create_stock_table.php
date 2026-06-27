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
    Schema::create('stock', function (Blueprint $table) {
        $table->id('stock_id');
        $table->foreignId('warehouse_id')->constrained('warehouses', 'warehouse_id');
        $table->foreignId('item_id')->constrained('items', 'item_id');
        $table->decimal('quantity', 10, 2);
        $table->decimal('reserved_qty', 10, 2)->default(0);
        $table->decimal('unit_cost', 12, 2)->nullable();
        $table->timestamp('last_updated')->useCurrent(); 
    });
}
};
