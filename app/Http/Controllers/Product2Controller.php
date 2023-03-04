<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\map;

class Product2Controller extends Controller
{
    private string $url;
    protected $elasticParams = [];

    public function __construct()
    {
        $this->url = config('elasticsearch.hosts')[0] . '/' . config('elasticsearch.index_prefix') . 'logs/_search';
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
            $response = Http::withBasicAuth('elastic', 'password')->get($this->url, $this->elasticParams);
            $data = json_decode($response->body());
            $products = collect($data->hits->hits)->map(function ($hit) {
                // dd($hit->_source->after);
                if(isset($hit->_source->after))
                    return $hit->_source->after;

                return;
            });

            return $products;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
