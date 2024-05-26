<?php

namespace App\Admin\Repositories;

use App\Models\Warehouse as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Warehouse extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
