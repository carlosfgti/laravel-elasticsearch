<?php

namespace Core\Category\Application\UseCases;

use Core\Category\Application\DTO\CategoryInputDto;
use Core\Category\Application\DTO\CategoryOutputDto;
use Core\Category\Domain\Repository\CategoryRepositoryInterface;

class ListCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function execute(CategoryInputDto $input): CategoryOutputDto
    {
        $category = $this->repository->findById($input->id);

        return new CategoryOutputDto(
            id: $category->id(),
            name: $category->name,
            description: $category->description,
            is_active: $category->isActive,
            created_at: $category->createdAt(),
        );
    }
}
