<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $primaryKey = 'transaction_id';
    protected $fillable = ['transaction_no', 'type', 'warehouse_id', 'item_id', 'supplier_id', 'quantity', 'unit_cost', 'total_cost', 'reference_no', 'notes', 'created_by', 'status'];
}