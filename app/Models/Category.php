<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // تحديد الحقول المسموح بتخزينها دفعة واحدة لحماية النظام 
    protected $fillable = ['name', 'description'];

    protected $primaryKey = 'category_id'; 
}