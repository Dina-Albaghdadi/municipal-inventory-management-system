<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id'; 

    // تحديد الحقول المسموح بتخزينها (Mass Assignment) 
    protected $fillable = ['name', 'description', 'parent_id'];

    // العلاقات (Relations) 
    public function items() {
        // الفئة الواحدة لها أصناف كثيرة
        return $this->hasMany(Item::class, 'category_id', 'category_id');
    }

    // Mutator: تحويل أول حرف من الاسم لكبير عند الحفظ لتناسق البيانات
    public function setNameAttribute(string $value) {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }
}