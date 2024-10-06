<?php
return [
    'labels' => [
        'InventoryLog' => '库存记录',
        'inventory-log' => '库存记录',
    ],
    'fields' => [
        'zt_products_id' => '产品id',
        'zt_stores_id' => '客户id',
        'type' => '类型',
        'quantity' => '数量',
        'description' => '备注',
        'product' => [
            'model'=>'型号'
        ],
        'store' => [
            'name'=>'客户'
        ],
    ],
    'options' => [
    ],
];
