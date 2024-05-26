<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWarehouse
 */
class Warehouse extends Model
{
    //库存
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(ZtStore::class,'zt_stores_id','code');
    }

    public function product()
    {
        return $this->belongsTo(ZtProduct::class,'zt_products_id','id');
    }
}
