<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperZtSale
 */
class ZtSale extends Model
{
    use HasFactory;

    public function store()
    {
        return $this->belongsTo(ZtStore::class, 'ownerShopName', 'name');
    }

    public function gati()
    {
        return $this->belongsTo(ZtGati::class,'model','model');
    }

    public function reward()
    {
        return $this->belongsTo(ZtReward::class,'model','model');
    }

}
