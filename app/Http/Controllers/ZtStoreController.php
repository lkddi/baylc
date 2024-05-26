<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZtStoreResource;
use App\Models\ZtStore;

class ZtStoreController extends Controller
{
    public function store()
    {
        return ZtStoreResource::collection(ZtStore::all());
    }
}
