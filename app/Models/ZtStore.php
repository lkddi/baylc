<?php

namespace App\Models;

use Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZtStore extends Model
{
    use HasFactory;

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];


    public function big()
    {
        return $this->belongsTo(ZtDeptBigRegion::class, 'title', 'deptBigRegionName');
    }

    public function wxsales()
    {
        return $this->hasMany(WxSale::class);
    }


    public function scopeCompany($query)
    {
        $user_company = checkAdminCompany();
        if ($user_company != 1000) {
            return $query->where('zt_company_id', $user_company);
        }
    }

    public function scopeEnable($query)
    {
        return $query->where('isEnable', '1');
    }

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($store) {
            event(new \App\Events\ZtStoreUpdated($store));
        });

        static::created(function ($store) {
            event(new \App\Events\ZtStoreUpdated($store));
        });

        static::deleted(function ($store) {
            event(new \App\Events\ZtStoreUpdated($store));
        });
    }

//    public function ztsales()
//    {
//        return $this->belongsTo(ZtSale::class,'')
//    }


}
