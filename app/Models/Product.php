<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';
    protected $with = [
    ];
    protected $fillable = [
        'name', 'category_id','user_id', 'price', 'description', 'phone_number',  'location', 'image',
    ];

    protected $appends = [
        'img_url',
        'img_path'
    ];

    function getImgUrlAttribute(){
        return '/!/thumbs/products/';
    }
    function getImgPathAttribute(){
        return storage_path($this->getImgUrlAttribute());
    }

    function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
