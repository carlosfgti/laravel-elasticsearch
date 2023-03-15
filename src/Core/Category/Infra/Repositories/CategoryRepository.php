<?php

namespace Core\Category\Infra\Repositories;

use App\Repositories\Presenters\PaginationPresenter;
use Core\Category\Domain\Entities\Category;
use Core\Category\Domain\Repository\CategoryRepositoryInterface;
use Core\SeedWork\Domain\Repository\PaginationInterface;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected Client $client,
        protected $elasticParams = [],
    ) {}

    public function findById(string $id): Category
    {

    }

    public function findAll(string $filter = '', $order = 'DESC'): array
    {
        if ($filter) {
            $this->elasticParams['body'] = [
                'query' => [
                    'match' => [
                        'after.message' => $filter
                    ]
                ]
            ];
        }
        try {
            $response = $this->client->search($this->elasticParams);
        } catch (ClientResponseException $e) {
            throw $e;
        } catch (ServerResponseException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }

        return $response->asArray();
    }

    public function paginate(string $filter = '', $order = 'DESC', int $page = 1, int $totalPage = 15): PaginationInterface
    {
        if ($filter !== '') {
            $this->elasticParams['body'] = [
                'query' => [
                    'match' => [
                        'after.message' => $filter
                    ]
                ]
            ];
        }
        try {
            $response = $this->client->search($this->elasticParams);
        } catch (ClientResponseException $e) {
            throw $e;
        } catch (ServerResponseException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }

        return new PaginationPresenter($response->asArray());
    }
}
