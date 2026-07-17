<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';
    protected $primaryKey = 'warehouse_id';
    protected $fillable = ['name', 'location', 'type', 'manager_name', 'phone', 'capacity', 'status'];

    protected $casts = [
        'capacity' => 'decimal:2',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'warehouse_id', 'warehouse_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'warehouse_id', 'warehouse_id');
    }
}