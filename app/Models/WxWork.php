<?php

namespace App\Models;

use Admin;
use Dcat\Admin\Models\MenuCache;
use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WxWork extends Model
{
    use HasFactory;
    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];


    public function WorkUsers()
    {
        return $this->belongsToMany(WxWorkUser::class, 'wx_work_wx_work_user', 'wx_work_id', 'wx_work_user_id');

    }

    public function companys()
    {
        return $this->belongsTo(ZtCompany::class, 'zt_company_id','id');
    }

    public function scopeCompany($query)
    {
        if (Admin::user()->id != 1) {
            if (Admin::user()->isRole('chengdu')) {
                return $query->where('zt_company_id', '2');
            } elseif (Admin::user()->isRole('beijing')) {
                return $query->where('zt_company_id', '1');
            }
        }
    }


    public function welcomes()
    {
        return $this->belongsToMany(GroupWelcomeMessage::class,'group_welcome_message_wx_works','wx_work_id','group_welcome_message_id');
    }

}
