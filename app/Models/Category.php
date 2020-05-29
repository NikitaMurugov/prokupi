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

    protected $appends = [
        'img_url',
    ];

    function getImgUrlAttribute() {
        return '/!/thumbs/categories/' . $this->id . '.svg';
    }

    function products() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
