<?php

namespace App\Repositories;

class UserRepository extends AbstractRepository
{
    public function findByEmail(string $data)
    {
        return $this->model::where('email', $data)->first();
    }
}
