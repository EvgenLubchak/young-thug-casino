<?php

declare(strict_types=1);

namespace App\Services\User;

use App\DTO\Auth\RegisterRequestDTO;
use App\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param RegisterRequestDTO $registerRequestDTO
     * @return User
     */
    public function store(RegisterRequestDTO $registerRequestDTO): User
    {
        return $this->userRepository->store($registerRequestDTO->toArray());
    }
}
