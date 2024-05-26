<?php

namespace App\Admin\Repositories;

use App\Models\WorkMessage as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WorkMessage extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
