<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TransferOrder extends Model {
    protected $primaryKey = 'transfer_id';
    protected $fillable = ['transfer_no', 'from_warehouse', 'to_warehouse', 'transfer_date', 'status', 'approved_by', 'notes'];
}