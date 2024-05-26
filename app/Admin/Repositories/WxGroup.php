<?php

namespace App\Admin\Repositories;

use App\Models\WxGroup as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxGroup extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

}
