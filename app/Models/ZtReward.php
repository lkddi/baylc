<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZtReward extends Model
{
    use HasFactory;
    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

    public function model()
    {
        return $this->belongsTo(ZtProduct::class,'title','model');
    }
}
