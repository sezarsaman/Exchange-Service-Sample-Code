<?php

namespace App\Repositories\Contracts;

use http\Env\Request;

interface OrderRepositoryInterface
{
    public function all();

    public function findByReferenceCode($code);

    public function store(array $item);

}