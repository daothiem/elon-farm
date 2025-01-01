<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['avatar', 'images', 'alias', 'name',
        'is_deleted', 'available', 'order_by', 'is_hot', 'price', 'price_delivery','price_discount', 'created_by',
        'happy_price', 'tax', 'order_by_special', 'is_new', 'meta_title', 'meta_description', 'meta_key_word', 'description', 'ordering', 'content',
        'note', 'questions', 'subtitle', 'priceText', 'map_gif', 'map_google_address'
    ];

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'tag_products', 'product_id', 'tag_id');
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


    public function tourPlans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TourPlan::class, 'product_id');
    }

    public function amenities(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'tour_amenities', 'product_id', 'amenity_id');
    }
}
