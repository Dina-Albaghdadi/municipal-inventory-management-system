<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $primaryKey = 'item_id'; 
    // تحديد جميع الحقول المسموح بتخزينها دفعة واحدة]
    protected $fillable = ['code', 'name', 'description', 'category_id', 'unit', 'min_stock', 'max_stock', 'status'];
}