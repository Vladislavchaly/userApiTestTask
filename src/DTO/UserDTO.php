<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;

class UserDTO
{
    public function __construct(
        #[NotBlank]
        public string $id,
        #[NotBlank]
        public string $phone,
        #[NotBlank]
        public string $login,
        #[NotBlank]
        public string $password,
    ){
    }

    public static function fromEntity(object $entity): self
    {
        return new self(
            id: $entity->getId()->toString(),
            phone: $entity->getPhone(),
            login: $entity->getLogin(),
            password: $entity->getPassword(),
        );
    }
}