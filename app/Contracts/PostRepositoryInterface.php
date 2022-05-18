<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Post;
}
