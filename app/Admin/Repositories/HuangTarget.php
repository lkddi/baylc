<?php

namespace App\Admin\Repositories;

use App\Models\HuangTarget as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class HuangTarget extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
