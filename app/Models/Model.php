<?php

namespace App\Models;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Model extends Eloquent
{
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
