<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPostRequest;
use App\Http\Resources\WxSaleResource;
use App\Models\WxSale;
use App\Models\ZtProduct;
use Illuminate\Http\Request;
use Response;


class ProductController extends Controller
{

    public function create(ProductPostRequest $request)
    {
        $validated = $request->validated();
        ZtProduct::create($validated);

        return response()->json([
            'message' => '产品创建成功',
            'data' => $request->validated(),
            'statusCode' => 200,
        ], 200);

    }

}
