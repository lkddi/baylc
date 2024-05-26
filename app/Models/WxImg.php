<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWxImg
 */
class WxImg extends Model
{
    // 发票记录表
    use HasFactory;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function wxuser()
    {
        return $this->belongsTo(WxUser::class, 'from_wxid', 'wxid');
    }

    /**
     * @param $query
     * @param $wxid
     * @return void
     */
    public function scopeWxid($query, $wxid)
    {
        $query->where('from_group', $wxid);
    }
}

