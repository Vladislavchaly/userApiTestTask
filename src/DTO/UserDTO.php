<?php

declare(strict_types=1);

namespace App\DTO;

class UserDTO
{
    public function __construct(
        public string $phone,
        public string $login,
        public string $password,
    )
    {
    }
}