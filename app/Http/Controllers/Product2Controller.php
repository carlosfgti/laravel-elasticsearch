<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Product2Controller extends Controller
{
    private string $url;
    protected $elasticParams = [];

    public function __construct()
    {
        $this->url = config('elasticsearch.hosts')[0] . '/' . config('elasticsearch.index_prefix') . 'products/_search';
    }

    public function index(Request $request)
    {
        $name = $request->get('name');
        if ($name) {
            $this->elasticParams = [
                'query' => [
                    'match' => [
                        'after.nome' => $name
                    ]
                ]
            ];
        }
        try {
            $response = Http::get($this->url, $this->elasticParams);
            $data = json_decode($response->body());

            foreach($data->hits->hits as $hit) {
                $product = $hit->_source->after;
                dd($product);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
