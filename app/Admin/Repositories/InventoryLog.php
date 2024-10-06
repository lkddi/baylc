<?php

namespace App\Admin\Repositories;

use App\Models\InventoryLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class InventoryLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;



}
