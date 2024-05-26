<?php

namespace App\Admin\Repositories;

use App\Models\RuningGroup as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class RuningGroup extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'runing_groups';
}
