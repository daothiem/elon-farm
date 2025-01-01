<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourAmenity extends Model
{
    use HasFactory;

    protected $table = 'tour_amenities';

    protected $fillable = [
        'product_id', 'amenity_id'
    ];
}
