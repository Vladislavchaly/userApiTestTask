<?php

declare(strict_types=1);

namespace App\Controller\Api\v1\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api/v1/users", name: "api_user_")]
class UserController extends AbstractController
{
    #[Route('/', name: 'current_user')]
    public function index(): JsonResponse
    {
        return $this->json($this->getUser());
    }

    #[Route('/list', name: 'list_users')]
    public function list(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
