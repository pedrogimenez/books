<?php

declare(strict_types=1);

namespace Books\Infrastructure\Delivery\Symfony\App\Controller;

use Books\Application\CreateBookRequest;
use Books\Application\CreateBookService;
use Books\Infrastructure\Persistence\Doctrine\DoctrineBookRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $params = json_decode($request->getContent(), true);

        $bookRepository = new DoctrineBookRepository($em);
        $bookService = new CreateBookService($bookRepository);
        $bookRequest = new CreateBookRequest(
            $params['isbn'],
            $params['title'],
            $params['description']);

        $response = $bookService->execute($bookRequest);

        return new JsonResponse($response->toJSON(), 201, ["Location" => $request->getSchemeAndHttpHost() . "/books/" . $response->isbn()]);
    }
}