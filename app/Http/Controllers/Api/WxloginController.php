<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;


class WxloginController extends Controller
{
    public function Login()
    {

       $user = User::find(1);

       $aa = auth('api')->login($user);
       dd($aa);

   }

}
