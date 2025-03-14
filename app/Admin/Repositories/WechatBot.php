<?php

namespace App\Admin\Repositories;

use App\Models\WechatBot as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class WechatBot extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
