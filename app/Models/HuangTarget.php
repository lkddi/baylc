<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HuangTarget extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(WxUser::class,'wxid','wxid');
    }
}
