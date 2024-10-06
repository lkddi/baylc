<?php

namespace App\Admin\Repositories;

use App\Models\WxWork as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxWork extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
