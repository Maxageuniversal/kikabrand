<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['tracking_number', 'status', 'estimated_delivery', 'origin'];

    // You can add relationships or other methods if needed
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
