<?php

namespace App\Admin\Repositories;

use App\Models\ZtProduct as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtProduct extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
