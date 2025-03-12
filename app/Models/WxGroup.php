<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

//    public function admin()
//    {
//        return $this->belongsTo(WxUser::class, 'admin_wxid', 'wxid');
//    }

    public function scopeWxid($query, $wxid)
    {
        $query->where('wxid', $wxid);
    }
    public function bot()
    {
        return $this->belongsTo(WechatBot::class,'robot_wxid','wxid');
    }

    public function company()
    {
        return $this->belongsTo(ZtCompany::class, 'zt_company_id','id');
    }



    public function users(){
        return $this->hasMany(WxUser::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($group) {
            // 使用事务确保数据一致性
            DB::transaction(function () use ($group) {
                $group->users()->delete(); // 删除所有关联用户
            });
        });
    }

}
