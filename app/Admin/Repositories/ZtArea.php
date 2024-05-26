<?php

namespace App\Admin\Repositories;

use App\Models\ZtArea as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtArea extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
