<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static wxid(mixed $from_group)
 */
class WxGroup extends Model
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
        return $this->belongsTo(ZtStore::class);
    }

    public function retail()
    {
        return $this->belongsTo(ZtRetail::class, 'retailCode', 'code');
    }

    public function deptRegion()
    {
        return $this->belongsTo(ZtDeptRegion::class);
    }

    public function deptBigRegion()
    {
        return $this->belongsTo(ZtDeptBigRegion::class);
    }

    public function admin()
    {
        return $this->belongsTo(WxUser::class, 'admin_wxid', 'wxid');
    }

    public function scopeWxid($query, $wxid)
    {
        $query->where('wxid', $wxid);
    }
    public function bot()
    {
        return $this->belongsTo(WxBot::class,'robot_wxid','wxid');
    }
}
