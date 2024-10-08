<?php

namespace App\Admin\Repositories;

use App\Models\ZtGati as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtGati extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
