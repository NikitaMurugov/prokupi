<?php

namespace App\Models;

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
        return '/!/thumbs/users/'.$this->id.'.jpeg';
    }
    function getImgPathAttribute(){
        return public_path($this->getImgUrlAttribute());
    }

    function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
