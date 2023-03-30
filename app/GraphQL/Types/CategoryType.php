<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Array of categories',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'ID of category'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the category'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'E-mail of the category'
            ],
            'is_active' => [
                'type' => Type::boolean(),
                'description' => 'Active of the category'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Created of the category'
            ],
        ];
    }
}
