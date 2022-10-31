<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @param array $date
     * @return User
     */
    public function store(array $date): User
    {
        return User::create($date);
    }
}
