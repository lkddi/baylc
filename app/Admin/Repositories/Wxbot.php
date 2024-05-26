<?php

namespace App\Admin\Repositories;

use App\Models\WxBot as Model;
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
