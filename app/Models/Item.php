<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';
    protected $fillable = ['code', 'name', 'description', 'category_id', 'unit', 'min_stock', 'max_stock', 'reorder_level', 'status'];

    // تحويل البيانات لضمان الدقة الحسابية (Task 7)
    protected $casts = [
        'min_stock' => 'decimal:2',
        'max_stock' => 'decimal:2',
        'reorder_level' => 'decimal:2',
    ];

    // Mutator: تكبير أول حرف من الاسم تلقائياً (Task 7)
    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'item_id', 'item_id');
    }
}