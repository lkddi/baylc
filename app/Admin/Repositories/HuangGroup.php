<?php

namespace App\Admin\Repositories;

use App\Models\HuangGroup as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class HuangGroup extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
