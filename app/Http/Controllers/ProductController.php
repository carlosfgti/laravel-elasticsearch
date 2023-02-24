<?php

namespace App\Http\Controllers;

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Client;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected Client $client,
        protected $elasticParams = [],
    ) {
        $this->elasticParams = [
            'index' => config('elasticsearch.index_prefix') . 'products',
            'body' => [
                'query' => []
            ],
        ];
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->elasticParams['body'] = [
                'query' => [
                    'match' => [
                        'name' => $name
                    ]
                ]
            ];
        }
        try {
            $response = $this->client->index($this->elasticParams);
        } catch (ClientResponseException $e) {
            throw $e;
        } catch (ServerResponseException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }

        return $response->asArray();
    }
}
