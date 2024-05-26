<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperZtDeptBigRegion
 */
class ZtDeptBigRegion extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->hasMany(ZtStore::class,'deptBigRegionName','title');
//        return $this->hasMany(ZtStore::class,'code','deptBigRegionCode');
    }


}
