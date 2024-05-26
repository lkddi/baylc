<?php

namespace App\Admin\Repositories;

use App\Models\Wxbot as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Wxbot extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
