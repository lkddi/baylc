<?php

namespace App\Http\Controllers;


use App\Http\Requests\WxSaleRequest;

class WxSaleController extends Controller
{
    public function __invoke(WxSaleRequest $request){
        dd(11);
    }

    public function check(WxSaleRequest $request)
    {

    }

}
