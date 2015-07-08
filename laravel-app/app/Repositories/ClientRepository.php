<?php

namespace App\Repositories;


use App\Models\Client;


class ClientRepository
{
    private $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function getModel()
    {
        return $this->model;
    }
} 