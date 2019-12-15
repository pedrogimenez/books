<?php

declare(strict_types=1);

namespace Books\Infrastructure\Delivery\Symfony\App\Controller;

use Books\Application\CreateBookRequest;
use Books\Application\CreateBookService;
use Books\Application\ListBooksService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", methods={"POST"})
     * @param Request $request
     * @param CreateBookService $createBookService
     * @return JsonResponse
     */
    public function create(Request $request, CreateBookService $createBookService)
    {
        $params = json_decode($request->getContent(), true);

        $bookRequest = new CreateBookRequest(
            $params['isbn'],
            $params['title'],
            $params['description']);

        $response = $createBookService->execute($bookRequest);

        return new JsonResponse($response->toJSON(), 201, ["Location" => $request->getSchemeAndHttpHost() . "/books/" . $response->isbn()]);
    }

    /**
     * @Route("/books", methods={"GET"})
     * @param ListBooksService $listBooksService
     * @return JsonResponse
     */
    public function list(ListBooksService $listBooksService)
    {
        $response = $listBooksService->execute();

        return new JsonResponse(array_map(function ($bookDTO) { return $bookDTO->toJSON(); }, $response));
    }
}