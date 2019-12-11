<?php

declare(strict_types=1);

namespace Books\Infrastructure\Delivery\Symfony\App\Controller;

use Books\Application\CreateBookService;
use Books\Infrastructure\Persistence\Doctrine\DoctrineBookRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    /** @Route("/books") */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $bookRepository = new DoctrineBookRepository($em);
        $bookService = new CreateBookService($bookRepository);

        $bookService->execute();

        return new Response("Book created!");
    }
}