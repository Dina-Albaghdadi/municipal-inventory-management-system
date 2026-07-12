<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $primaryKey = 'item_id'; 
    // تحديد جميع الحقول المسموح بتخزينها دفعة واحدة]
    protected $fillable = ['code', 'name', 'description', 'category_id', 'unit', 'min_stock', 'max_stock', 'status'];
    //relations
    public function category() {
    return $this->belongsTo(Category::class, 'category_id', 'category_id');
}

public function stocks() {
    return $this->hasMany(Stock::class, 'item_id', 'item_id');
}
// تحويل أنواع البيانات تلقائياً (Casting)
protected $casts = [
    'price' => 'decimal:2',
    'quantity' => 'integer',
    'status' => 'boolean',
];

// دالة (Mutator) لتنسيق الاسم قبل حفظه في القاعدة
public function setNameAttribute(string $value) {
    $this->attributes['name'] = ucfirst(strtolower($value));
}

// دالة (Accessor) لعرض السعر مع العملة
public function getFormattedPriceAttribute() {
    return $this->price . ' ILS';
}

}