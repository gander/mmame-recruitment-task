<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\DBAL\Connection as DbalConnection;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment as Templating;

#[Route('/')]
final class IndexAction
{
    public function __invoke(
        ServerRequestInterface   $request,
        ResponseFactoryInterface $responseFactory,
        DbalConnection           $connection,
        Templating               $twig,
    ): ResponseInterface
    {
        $params = $request->getQueryParams();

        $action = isset($params['akcja']) ? (int)$params['akcja'] : null;
        $sort = isset($params['sort']) ? (int)$params['sort'] : null;
        $id = isset($params['i']) ? (int)$params['i'] : null;

        $qb = $connection->createQueryBuilder();

        $query = $qb
            ->select('*')
            ->from('contracts');

        if ($action === 5) {
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

        $records = $query->executeQuery()->fetchAllNumeric();

        if ($action === 5) {
            $records = array_map(static function (array $record) {
                if ($record[10] > 5) {
                    $record[2] = sprintf('%s %s', $record[2], $record[10]);
                }
                return $record;
            }, $records);
        }

        /**
         * This section is responsible for reducing the data passed to the template
         * to prevent potential data leakage and enhance security by limiting
         * the exposure of sensitive information in the view layer.
         */
        $records = array_map(static fn(array $record) => [$record[0], $record[2]], $records);

        $data = $twig->render('index.html.twig', ['records' => $records]);

        return $responseFactory
            ->createResponse()
            ->withHeader('Content-Type', 'text/html')
            ->withBody($responseFactory->createStream($data));
    }
}
