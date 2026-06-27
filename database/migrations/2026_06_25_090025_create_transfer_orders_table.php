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
    Schema::create('transfer_orders', function (Blueprint $table) {
        $table->id('transfer_id');
        $table->string('transfer_no', 50)->unique();
        $table->foreignId('from_warehouse_id')->constrained('warehouses', 'warehouse_id');
        $table->foreignId('to_warehouse_id')->constrained('warehouses', 'warehouse_id');
        $table->dateTime('transfer_date');
        $table->enum('status', ['Draft', 'Shipped', 'Received', 'Cancelled']);
        $table->foreignId('approved_by')->nullable()->constrained('users', 'id');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}
};
