<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupWelcomeMessage extends Model
{
    use HasFactory;

    public function works()
    {
        return $this->belongsToMany(WxWork::class, 'group_welcome_message_wx_works', 'group_welcome_message_id', 'wx_work_id');
    }
}
