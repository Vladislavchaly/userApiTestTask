<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Entity\User;
use App\Repository\UserRepository;

readonly class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function createUser(UserDTO $userDTO): User
    {
        return $this->userRepository->create(
            [
                'login' => $userDTO->login,
                'phone' => $userDTO->phone,
                'password' => password_hash($userDTO->password, PASSWORD_DEFAULT),
            ],
        );
    }
}