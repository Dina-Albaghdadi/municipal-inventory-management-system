<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TransferItem extends Model {
    protected $table = 'transfer_items';
    protected $fillable = ['transfer_id', 'item_id', 'requested_qty', 'transferred_qty', 'notes'];
}