<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferOrder extends Model
{
    protected $table = 'transfer_orders';
    protected $primaryKey = 'transfer_id';
    protected $fillable = ['transfer_no', 'from_warehouse_id', 'to_warehouse_id', 'transfer_date', 'status', 'approved_by', 'notes'];

    public function fromWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'from_warehouse_id', 'warehouse_id');
    }

    public function toWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'to_warehouse_id', 'warehouse_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function transferItems()
    {
        return $this->hasMany(TransferItem::class, 'transfer_id', 'transfer_id');
    }
}