<?php

namespace App\Http\Controllers;

use App\Adapters\ApiAdapter;
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
        $response = $useCase->execute(
            input: new ListCategoriesInputDto(
                filter: $request->filter ?? '',
                order: $request->get('order', 'DESC'),
                page: (int) $request->get('page', 1),
                totalPage: (int) $request->get('totalPerPage', 15),
            )
        );

        return (new ApiAdapter($response))
                    ->toJson();
    }
}
