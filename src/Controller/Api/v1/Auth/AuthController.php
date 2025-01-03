<?php

declare(strict_types=1);

namespace App\Controller\Api\v1\Auth;

use App\DTO\UserDTO;
use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api/v1/auth", name: "api_user_")]
class AuthController extends AbstractController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Route('/login', name: 'app_login', methods: Request::METHOD_POST)]
    public function login(): JsonResponse
    {
        return $this->json([
          'data' => $this->getUser(),
        ]);
    }

    #[Route('/register', name: 'app_register', methods: Request::METHOD_POST)]
    public function register(#[MapRequestPayload('json')] UserDTO $userDTO): JsonResponse
    {
        return $this->json([
            'data' => $this->userService->createUser($userDTO),
        ]);
    }
}
