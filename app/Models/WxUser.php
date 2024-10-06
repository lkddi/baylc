<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @mixin IdeHelperWxUser
 * @property int|mixed $zt_store_code
 */
class WxUser extends Model
{
    use HasFactory;
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(WxGroup::class, 'group_wxid', 'wxid');
    }

    public function store()
    {
//        return $this->belongsTo(ZtStore::class,'code','zt_store_code');
        return $this->belongsTo(ZtStore::class,'zt_store_code','code');
    }

    public function scopeWxid($query,$wxid,$group)
    {
        $query->where('group_wxid',$group)->where('wxid',$wxid);
    }
}
