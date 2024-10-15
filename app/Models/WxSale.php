<?php

namespace App\Models;

use Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WxSale extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(ZtStore::class,'zt_store_id','id');
    }

    public function product()
    {
        return $this->belongsTo(ZtProduct::class,'zt_product_id','id');
    }

    public function wxuser()
    {
        return $this->belongsTo(WxUser::class,'user','wxid');

    }

    public function workuser()
    {
        return $this->belongsTo(WxWorkUser::class,'from_wxid','sender');
    }
    public function company()
    {
        return $this->belongsTo(ZtCompany::class,'zt_company_id','id');
    }

    public function work(){
        return $this->belongsTo(WxWork::class,'from_group','roomid');
    }

    public function scopeCompany($query)
    {
        if (Admin::user()->id != 1) {
            if (Admin::user()->isRole('chengdu')) {
                return $query->where('zt_company_id', '2');
            } elseif (Admin::user()->isRole('beijing')) {
                return $query->where('zt_company_id', '1');
            } elseif (Admin::user()->isRole('xian')) {
                return $query->where('zt_company_id', '3');
            }
        }
    }

}
