<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWxSale
 * @property mixed $zt_store_code
 * @property mixed $from_group
 * @property mixed $from_wxid
 */
class WxSale extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(ZtStore::class,'zt_store_code','code');
    }

    public function product()
    {
        return $this->belongsTo(ZtProduct::class,'zt_product_id','id');
    }

    public function wxuser()
    {
        return $this->belongsTo(WxUser::class,'user','wxid');

    }

    public function company()
    {
        return $this->belongsTo(ZtCompany::class,'zt_company_id','id');
    }

}
