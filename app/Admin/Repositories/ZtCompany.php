<?php

namespace App\Admin\Repositories;

use App\Models\ZtCompany as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtCompany extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
