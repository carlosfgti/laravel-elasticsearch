<?php

namespace Core\Category\Application\UseCases;

use Core\Category\Application\DTO\ListCategoriesInputDto;
use Core\Category\Application\DTO\ListCategoriesOutputDto;
use Core\Category\Domain\Repository\CategoryRepositoryInterface;

class ListCategoriesUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(ListCategoriesInputDto $input): array
    {
        return $this->repository->findAll(
            filter: $input->filter,
            order: $input->order
        );
        // $categories = $this->repository->paginate(
        //     filter: $input->filter,
        //     order: $input->order,
        //     page: $input->page,
        //     totalPage: $input->totalPage,
        // );

        // return new ListCategoriesOutputDto(
        //     items: $categories->items(),
        //     total: $categories->total(),
        //     current_page: $categories->currentPage(),
        //     last_page: $categories->lastPage(),
        //     first_page: $categories->firstPage(),
        //     per_page: $categories->perPage(),
        //     to: $categories->to(),
        //     from: $categories->from(),
        // );

        // return new ListCategoriesOutputDto(
        //     items: array_map(function ($data) {
        //         return [
        //             'id' => $data->id,
        //             'name' => $data->name,
        //             'description' => $data->description,
        //             'is_active' => (bool) $data->is_active,
        //             'created_at' => (string) $data->created_at,
        //         ];
        //     }, $categories->items()),
        //     total: $categories->total(),
        //     last_page: $categories->lastPage(),
        //     first_page: $categories->firstPage(),
        //     per_page: $categories->perPage(),
        //     to: $categories->to(),
        //     from: $categories->to(),
        // );
    }
}
