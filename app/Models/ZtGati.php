<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZtGati extends Model
{
    use HasFactory;
    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function model()
    {
        return $this->belongsTo(ZtProduct::class,'title','model');
    }

    public function product()
    {
        return $this->belongsTo(ZtProduct::class,'zt_product_id','id');
    }

    public function company()
    {
        return $this->belongsTo(ZtCompany::class,'zt_company_id','id');
    }

    public function scopeCompany($query)
    {
        $user_company = checkAdminCompany();
        if ($user_company != 1000) {
            return $query->where('zt_company_id', $user_company);
        }
    }
}
