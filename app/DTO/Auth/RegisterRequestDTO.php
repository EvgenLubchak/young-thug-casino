<?php

declare(strict_types=1);

namespace App\DTO\Auth;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterRequestDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $phone;
    public string $password;
}
