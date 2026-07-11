<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model {
    protected $primaryKey = 'warehouse_id';
    protected $fillable = ['name', 'location', 'type', 'manager_name', 'phone', 'capacity', 'status'];
}