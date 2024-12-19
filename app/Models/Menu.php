<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'title', 'url', 'parent_id', 'ordering'
    ];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id');
    }
    public function child(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
