<?php

namespace App\Contracts;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Post;
}
