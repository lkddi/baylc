<?php

namespace App\Admin\Repositories;

use App\Models\ZtCanalType as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtCanalType extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
