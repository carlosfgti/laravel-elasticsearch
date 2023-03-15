<?php

namespace App\Http\Controllers;

use App\Adapters\ApiAdapter;
use App\Http\Resources\CategoryResource;
use Core\Category\Application\DTO\ListCategoriesInputDto;
use Core\Category\Application\UseCases\ListCategoriesUseCase;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        // protected
    ) {}

    public function index(Request $request, ListCategoriesUseCase $useCase)
    {
        $categories = $useCase->execute(
            input: new ListCategoriesInputDto(
                filter: $request->filter ?? '',
            )
        );

        return CategoryResource::collection(collect($categories));

        // return (new ApiAdapter($response))
        //             ->toJson();
    }
}
