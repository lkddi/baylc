<?php

namespace App\Admin\Repositories;

use App\Models\WxMsg as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxMsg extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
