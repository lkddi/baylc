<?php

namespace App\Admin\Repositories;

use App\Models\ZtReward as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtReward extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
