<?php

namespace App\Admin\Repositories;

use App\Models\ZtRetail as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtRetail extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
