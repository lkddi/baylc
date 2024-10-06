<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class WxSalestarget extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function store()
    {
        return $this->belongsTo(ZtStore::class,'code','code');
    }
}
