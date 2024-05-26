<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperZtStore
 */
class ZtStore extends Model
{
    use HasFactory;

    public function big()
    {
        return $this->belongsTo(ZtDeptBigRegion::class,'title','deptBigRegionName');
    }
}
