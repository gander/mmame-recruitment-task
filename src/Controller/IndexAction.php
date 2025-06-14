<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Connection as DbalConnection;
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
        DbalConnection           $connection,
    ): ResponseInterface
    {
        $qb = $connection->createQueryBuilder();

        $records = $qb
            ->select('*')
            ->from('contracts')
            ->executeQuery()
            ->fetchAllAssociative();

        return $responseFactory
            ->createResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody($responseFactory->createStream(json_encode($records)));
    }
}
