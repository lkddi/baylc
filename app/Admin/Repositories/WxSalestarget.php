<?php

namespace App\Admin\Repositories;

use App\Models\WxSalestarget as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxSalestarget extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
