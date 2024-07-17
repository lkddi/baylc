<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ZtDeptBigRegion extends Model
{
    use HasFactory;

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
    public function store()
    {
        return $this->hasMany(ZtStore::class,'deptBigRegionName','title');
//        return $this->hasMany(ZtStore::class,'code','deptBigRegionCode');
    }


}
