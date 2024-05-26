<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HuangGroup extends Model
{
    use HasFactory;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(WxUser::class,'wxid','wxid');
    }
}
