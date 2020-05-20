<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $with = [
    ];
    protected $fillable = [
        'name',
    ];
    protected $withCount = [
        'products',
    ];

    function products() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
