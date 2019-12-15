<?php

declare(strict_types=1);

namespace Books\Infrastructure\Delivery\Symfony\App\Controller;

use Books\Application\CreateBookRequest;
use Books\Application\CreateBookService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", methods={"POST"})
     * @param Request $request
     * @param CreateBookService $bookService
     * @return JsonResponse
     */
    public function create(Request $request, CreateBookService $bookService)
    {
        $params = json_decode($request->getContent(), true);

        $bookRequest = new CreateBookRequest(
            $params['isbn'],
            $params['title'],
            $params['description']);

        $response = $bookService->execute($bookRequest);

        return new JsonResponse($response->toJSON(), 201, ["Location" => $request->getSchemeAndHttpHost() . "/books/" . $response->isbn()]);
    }
}