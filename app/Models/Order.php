<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_id',
        'promotion_id', 'amenities_id',
        'address', 'booking_type', 'from_date',
        'to_date', 'guest', 'price'
    ];
}
