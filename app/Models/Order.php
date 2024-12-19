<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name', 'customer_phone', 'province_code', 'district_code', 'ward_code', 'other_address', 'note', 'promotion_id', 'status', 'send_to'
    ];

    public function orderDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function province(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }
    public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
    public function ward(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ward::class, 'ward_code', 'code');
    }
}
