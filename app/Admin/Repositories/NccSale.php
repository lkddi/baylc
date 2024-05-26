<?php

namespace App\Admin\Repositories;

use App\Models\NccSale as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class NccSale extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
