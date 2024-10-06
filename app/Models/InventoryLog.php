<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryLog extends Model
{
    use HasFactory;

    /**
     * 可批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [
        'zt_products_id',
        'zt_stores_id',
        'type',
        'quantity'
    ];

    public function store()
    {
        return $this->belongsTo(ZtStore::class, 'zt_stores_id','id');
    }

    public function product()
    {
        return $this->belongsTo(ZtProduct::class, 'zt_products_id','id');
    }
}
