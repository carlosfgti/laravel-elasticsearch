<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'Collection of users',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of quest'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the quest'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'E-mail of the quest'
            ]
        ];
    }
}
