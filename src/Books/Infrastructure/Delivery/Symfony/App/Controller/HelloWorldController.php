<?php

declare(strict_types=1);

namespace Books\Infrastructure\Delivery\Symfony\App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    /** @Route("/") */
    public function index()
    {
        return new Response("Hello, world!");
    }
}