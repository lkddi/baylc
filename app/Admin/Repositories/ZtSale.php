<?php

namespace App\Admin\Repositories;

use App\Models\ZtSale as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtSale extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
