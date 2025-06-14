<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
final class IndexAction
{
    public function __invoke(
        RequestInterface         $request,
        ResponseFactoryInterface $responseFactory,
    ): ResponseInterface
    {
        $response = $responseFactory->createResponse();
        $response->getBody()->write((string)$request->getUri());
        return $response->withHeader('Content-Type', 'text/html');


    }
}
