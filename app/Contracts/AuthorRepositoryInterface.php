<?php

namespace App\Contracts;

use App\Models\Author;

interface AuthorRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Author;
}
