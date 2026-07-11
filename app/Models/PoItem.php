<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PoItem extends Model {
    protected $table = 'po_items';
    protected $fillable = ['po_id', 'item_id', 'quantity', 'unit_price', 'received_qty', 'notes'];
}