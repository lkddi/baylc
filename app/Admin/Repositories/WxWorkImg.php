<?php

namespace App\Admin\Repositories;

use App\Models\WxWorkImg as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxWorkImg extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
