<?php

return [
    'hosts' => [
        env('ELASTICSEARCH_HOST'),
    ],
    'index_prefix' => env('ELASTICSEARCH_INDEX_PREFIX')
];
