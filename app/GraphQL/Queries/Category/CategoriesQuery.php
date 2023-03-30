<?php

namespace App\GraphQL\Queries\Category;

use Core\Category\Infra\Repositories\CategoryRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'categories',
    ];

    public function __construct(
        private CategoryRepository $repository,
    ) {}

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Category'));
    }

    public function resolve($root, $args)
    {
        return $this->repository->findAll();
    }
}
