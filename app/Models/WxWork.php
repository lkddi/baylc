<?php

namespace App\Models;

use Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WxWork extends Model
{
    use HasFactory;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function WorkUsers()
    {
//        return $this->belongsToMany(WxUserWork::class);
        return $this->belongsToMany(WxWorkUser::class, 'wx_work_wx_work_user', 'wx_work_id', 'wx_work_user_id');

    }

    public function company()
    {
        return $this->belongsTo(ZtCompany::class, 'zt_company_id','id');
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


}
