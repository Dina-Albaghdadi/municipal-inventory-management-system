<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferItem extends Model
{
    protected $table = 'transfer_items';
    public $timestamps = false;

    protected $fillable = ['transfer_id', 'item_id', 'requested_qty', 'transferred_qty', 'notes'];

    protected $casts = [
        'requested_qty' => 'decimal:2',
        'transferred_qty' => 'decimal:2',
    ];

    public function transferOrder()
    {
        return $this->belongsTo(TransferOrder::class, 'transfer_id', 'transfer_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'item_id');
    }
}