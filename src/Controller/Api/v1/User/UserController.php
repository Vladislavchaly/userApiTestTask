<?php

declare(strict_types=1);

namespace App\Controller\Api\v1\User;

use App\DTO\UserDTO;
use App\Repository\UserRepository;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route("/api/v1/users", name: "api_user_")]
class UserController extends AbstractController
{
    public function __construct(
        public readonly UserRepository $userRepository,
    ){
    }

    #[Route('/', name: 'current_user', methods: Request::METHOD_GET)]
    public function index(): JsonResponse
    {
        return $this->json($this->getUser());
    }

    #[Route('/', name: 'create_user', methods: Request::METHOD_POST)]
    public function create(#[MapRequestPayload('json')] UserDTO $userDTO, ValidatorInterface $validator): JsonResponse
    {
        if (count($errors = $validator->validate($userDTO)) > 0) {
            throw new InvalidArgumentException($errors->get(0)->getMessage());
        }

        return new JsonResponse([UserDTO::fromEntity($this->userRepository->create($userDTO))]);
    }

    #[Route('/list', name: 'list_users', methods: Request::METHOD_GET)]
    public function list(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
