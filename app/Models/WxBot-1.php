<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static wxid($Wxid)
 * @mixin IdeHelperWxBot
 * @property mixed $online
 */
class WxBot extends Model
{
    use HasFactory;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];


    public function scopeWxid($query,$wxid)
    {
        $query->where('wxid', $wxid);
    }
}
