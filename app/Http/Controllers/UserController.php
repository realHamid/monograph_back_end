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

    public function save( Request $request ){

        $token = openssl_random_pseudo_bytes(20);
        $token = bin2hex($token);

        $insert = provinces::create([
            'full_name'     => $request->full_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'username'      => $request->username,
            'password'      => $request->password,
            'api_token'     => $request->$token,
        ]);

        if($insert){
            return json_encode(['status' =>  'true' ]);
        }else {
            return json_encode(['status' =>  'false']);
        }

    }



}
