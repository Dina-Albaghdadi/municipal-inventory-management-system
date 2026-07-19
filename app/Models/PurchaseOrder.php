<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';
    protected $primaryKey = 'po_id';
    protected $fillable = ['po_number', 'supplier_id', 'order_date', 'expected_date', 'status', 'total_amount', 'created_by', 'notes'];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'order_date' => 'datetime',
        'expected_date' => 'datetime',
    ];
    public function items() 
    {
    // ربط جدول الطلبات بجدول الأصناف عبر الجدول الوسيط po_items
    return $this->belongsToMany(Item::class, 'po_items', 'po_id', 'item_id')
                ->withPivot(['quantity', 'unit_price', 'received_qty']);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function poItems()
    {
        return $this->hasMany(PoItem::class, 'po_id', 'po_id');
    }
}

