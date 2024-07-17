<?php

namespace App\Models;

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
        return $this->belongsTo(ZtDeptBigRegion::class,'title','deptBigRegionName');
    }
}
