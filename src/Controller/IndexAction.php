<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Connection as DbalConnection;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
final class IndexAction
{
    public function __invoke(
        ServerRequestInterface   $request,
        ResponseFactoryInterface $responseFactory,
        DbalConnection           $connection,
    ): ResponseInterface
    {
        $params = $request->getQueryParams();

        $akcja = isset($params['akcja']) ? (int)$params['akcja'] : null;
        $sort = isset($params['sort']) ? (int)$params['sort'] : null;
        $id = isset($params['i']) ? (int)$params['i'] : null;

        $qb = $connection->createQueryBuilder();

        $query = $qb
            ->select('*')
            ->from('contracts');

        if ($akcja === 5) {
            $query
                ->where('kwota > 10')
                ->andWhere('id = :id')->setParameter('id', $id);

            if ($sort === 1) {
                $query->addOrderBy('2, 4', 'ASC');
            } elseif ($sort === 2) {
                $query->addOrderBy('10', 'DESC');
            }
        } else {
            $query->orderBy('id', 'ASC');
        }

        $records = $query->executeQuery()->fetchAllAssociative();

        return $responseFactory
            ->createResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withBody($responseFactory->createStream(json_encode($records)));
    }
}
