<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model {
    protected $table = 'stock'; 
    protected $primaryKey = 'stock_id';
    protected $fillable = ['warehouse_id', 'item_id', 'quantity', 'reserved_qty', 'unit_cost'];
}