<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = ['name', 'description', 'parent_id'];

    // العلاقة: الصنف قد يتبع لصنف أب
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'category_id');
    }

    // العلاقة: الصنف قد يحتوي على أصناف فرعية
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    // العلاقة: الصنف يحتوي على مواد متعددة
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'category_id');
    }
}