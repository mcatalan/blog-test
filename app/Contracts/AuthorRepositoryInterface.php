<?php

namespace App\Contracts;

use App\Models\Author;
use Illuminate\Support\Collection;

interface AuthorRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Author;
}
