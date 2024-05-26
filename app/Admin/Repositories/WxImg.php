<?php

namespace App\Admin\Repositories;

use App\Models\WxImg as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxImg extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
