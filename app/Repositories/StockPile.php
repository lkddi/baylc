<?php

namespace App\Admin\Repositories;

use App\Models\StockPile as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class StockPile extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
