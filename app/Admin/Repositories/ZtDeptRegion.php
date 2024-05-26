<?php

namespace App\Admin\Repositories;

use App\Models\ZtDeptRegion as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtDeptRegion extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
