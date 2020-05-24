<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function update_user(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->only([
            'name',
            's_name',
            't_name',
            'email',
            'phone_number',
            'location',
            'description',
            'avatar',
            'password',
        ]));
        $user->save();
        return route('cabinet');

    }
}
