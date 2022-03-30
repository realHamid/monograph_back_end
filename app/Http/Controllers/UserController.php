<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {

        $user = new User();

        $user = $user->where(['username' => $request->userName , 'password' => $request->password ])->first();

        if( $user != null ){
            $user['status_login'] = 'true';
            return (json_encode($user));
        }else {
            return (json_encode(['status_login' => 'false']));
        }

    }



}
