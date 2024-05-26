<?php

namespace App\Admin\Repositories;

use App\Models\ZtPromoterst as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ZtPromoterst extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
