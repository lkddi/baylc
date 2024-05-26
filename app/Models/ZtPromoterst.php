<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZtPromoterst extends Model
{
    use HasFactory;

    public function sales()
    {
        return $this->hasMany(ZtSale::class,'ownerShopName','storecodeName')->orderBy('purMachineTime', 'desc');
    }
}
