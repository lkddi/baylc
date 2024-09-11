<?php

namespace App\Models;

use Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        if (Admin::user()->id != 1) {
            if (Admin::user()->isRole('chengdu')) {
                return $query->where('zt_company_id', '2');
            } elseif (Admin::user()->isRole('beijing')) {
                return $query->where('zt_company_id', '1');
            }
        }
    }

    public function scopeEnable($query)
    {
        return $query->where('isEnable', '1');
    }
}
