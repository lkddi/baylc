<?php

namespace App\Admin\Repositories;

use App\Models\ZtChannel as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtChannel extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
