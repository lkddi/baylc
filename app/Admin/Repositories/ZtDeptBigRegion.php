<?php

namespace App\Admin\Repositories;

use App\Models\ZtDeptBigRegion as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtDeptBigRegion extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
