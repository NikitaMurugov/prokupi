<?php

namespace App;

use App\Models\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 's_name', 't_name', 'email', 'phone_number', 'location', 'description', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $withCount = [
        'products',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function products() {
        return $this->hasMany(Product::class, 'user_id');
    }

    function commentaries() {
        return $this->hasMany(Commentary::class, 'sender_id');
    }
}
