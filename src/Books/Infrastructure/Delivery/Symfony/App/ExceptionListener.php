<?php

namespace Books\Infrastructure\Delivery\Symfony\App;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        switch (get_class($exception)) {
            case \InvalidArgumentException::class:
                $status = JsonResponse::HTTP_BAD_REQUEST;
                break;
            default:
                $status = JsonResponse::HTTP_INTERNAL_SERVER_ERROR;
        }

        $response = new JsonResponse(['error' => $exception->getMessage()], $status);

        $event->setResponse($response);
    }
}