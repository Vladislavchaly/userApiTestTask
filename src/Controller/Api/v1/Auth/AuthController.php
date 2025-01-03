<?php

declare(strict_types=1);

namespace App\Controller\Api\v1\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
#[Route("/api/v1/auth", name: "api_user_")]
class AuthController extends AbstractController
{

    #[Route('/login', name: 'app_login', methods: Request::METHOD_POST)]
    public function login(): JsonResponse
    {
        return $this->json([
          'data' => $this->getUser(),
        ]);
    }
}
