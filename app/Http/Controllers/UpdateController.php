<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function update_user(Request $request)
    {
//        \DB::enableQueryLog();
        if (0) {
            User::update([
                'name' => $request['name'],
                's_name' => $request['s_name'],
                't_name' => $request['t_name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'location' => $request['location'],
                'description' => $request['description'],
                'avatar' => '',
                'password' => Hash::make($request['password']),
            ])->where('id', Auth::id());
        }
//        return route('cabinet');
    }
}
