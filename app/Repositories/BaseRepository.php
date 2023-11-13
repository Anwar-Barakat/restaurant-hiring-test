<?php

namespace App\Repositories;

abstract class BaseRepository
{
    abstract public function create(array $attributes);
}
