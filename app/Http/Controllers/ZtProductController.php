<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZtProductResource;
use App\Models\ZtProduct;
use Illuminate\Http\Request;

class ZtProductController extends Controller
{

    public function __invoke(){

    }
    public function product(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ZtProductResource::collection(ZtProduct::all());
    }
}
