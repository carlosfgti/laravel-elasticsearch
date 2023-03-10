<?php

namespace Core\Category\Domain\Repository;

use Core\Category\Domain\Entities\Category;
use Core\SeedWork\Domain\Repository\PaginationInterface;

interface CategoryRepositoryInterface
{
    public function findById(string $id): Category;
    public function findAll(string $filter = '', $order = 'DESC'): array;
    public function paginate(string $filter = '', $order = 'DESC', int $page = 1, int $totalPage = 15): PaginationInterface;
}
