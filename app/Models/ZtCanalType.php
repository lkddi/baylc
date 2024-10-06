<?php

namespace App\Models;

use Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZtCanalType extends Model
{
    use HasFactory;

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];


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
