<?php

namespace App\Admin\Repositories;

use App\Models\WxSale as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxSale extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
