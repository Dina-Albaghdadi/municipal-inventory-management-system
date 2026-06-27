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
    Schema::create('warehouses', function (Blueprint $table) {
        $table->id('warehouse_id');
        $table->string('name', 100);
        $table->string('location', 200)->nullable();
        $table->enum('type', ['Main', 'Sub', 'Cold', 'Temporary']);
        $table->string('manager_name', 100)->nullable();
        $table->string('phone', 20)->nullable();
        $table->decimal('capacity', 10, 2)->nullable(); 
        $table->enum('status', ['Active', 'Inactive']);
        $table->timestamps(); 
    });
}
};
