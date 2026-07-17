<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'stock_id';
    // timestamps: عبارة عن حقلين تلقائيين هما created_at و updated_at، ولكننا لا نستخدمهما في هذا الجدول، لذلك نحدد $timestamps = false
    public $timestamps = false;

    protected $fillable = ['warehouse_id', 'item_id', 'quantity', 'reserved_qty', 'unit_cost'];

    protected $casts = [
        'quantity' => 'decimal:2',
        'reserved_qty' => 'decimal:2',
        'unit_cost' => 'decimal:2',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'warehouse_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}