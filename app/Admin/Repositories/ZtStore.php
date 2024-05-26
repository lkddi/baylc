<?php

namespace App\Admin\Repositories;

use App\Models\ZtStore as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtStore extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
