<?php

namespace App\Admin\Repositories;

use App\Models\WxUserList as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WxUserList extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
