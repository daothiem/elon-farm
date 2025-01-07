<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewTour extends Model
{
    use HasFactory;

    protected $table = 'preview_tours';

    protected $fillable = [
        'product_id','avatar', 'title','content', 'first_name', 'host_name', 'localized_date', 'content_vi'
    ];
}
