<?php

namespace App\Admin\Repositories;

use App\Models\WxWorkUser as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxWorkUser extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
