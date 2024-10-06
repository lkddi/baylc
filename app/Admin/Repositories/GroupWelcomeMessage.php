<?php

namespace App\Admin\Repositories;

use App\Models\GroupWelcomeMessage as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class GroupWelcomeMessage extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;


}
