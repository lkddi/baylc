<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WxWork extends Model
{
    use HasFactory;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function WorkUsers()
    {
//        return $this->belongsToMany(WxUserWork::class);
        return $this->belongsToMany(WxWorkUser::class, 'wx_work_wx_work_user', 'wx_work_id', 'wx_work_user_id');

    }


}
