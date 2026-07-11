<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model {
    protected $primaryKey = 'po_id';
    protected $fillable = ['po_number', 'supplier_id', 'order_date', 'expected_date', 'status', 'total_amount', 'created_by', 'notes'];
}