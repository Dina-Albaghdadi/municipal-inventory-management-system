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
    Schema::table('users', function (Blueprint $table) {
        $table->string('username', 50)->after('id');
        $table->string('full_name', 100)->after('password');
        $table->enum('role', ['Admin', 'Manager', 'Worker']);
        $table->foreignId('warehouse_id')->nullable()->constrained('warehouses', 'warehouse_id');
        $table->string('phone', 20)->nullable();
        $table->enum('status', ['Active', 'Inactive']);
    });
}
};
