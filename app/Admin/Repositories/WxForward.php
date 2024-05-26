<?php

namespace App\Admin\Repositories;

use App\Models\WxForward as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxForward extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
