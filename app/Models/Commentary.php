<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $table = 'categories';

    protected $withCount = [
        'product'
    ];

    protected $fillable = [
        'product_id','sender_id','message',
    ];


    function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    function user() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
