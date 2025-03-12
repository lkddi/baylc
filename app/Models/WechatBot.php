<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WechatBot extends Model
{
    use HasDateTimeFormatter;

//    protected $table = 'wechatbot';
    protected $fillable = ['nickName', 'smallHeadImgUrl', 'wxid', 'token', 'appid'];

    public function company()
    {
        return $this->belongsTo(ZtCompany::class, 'zt_company_id', 'id');
    }


}
