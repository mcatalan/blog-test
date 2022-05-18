<?php

namespace App\Repositories;

use App\Contracts\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository extends ApiRepository implements PostRepositoryInterface
{
    protected string $path = 'posts';

    public function all(): Collection
    {
        $results = $this->get();
        if (!$results) return new Collection();

        $data = new Collection();
        foreach ($results as $result) {
            $data->push($this->make($result));
        }

        return $data;
    }

    public function find(int $id): ?Post
    {
        $results = $this->get();
        if (!$results) return null;

        foreach ($results as $result) {
            if ($result['id'] === $id) {
                return $this->make($result);
            }
        }

        return null;
    }

    private function make(array $data): Post
    {
        return new Post(
            $data['id'],
            $data['userId'],
            $data['title'],
            $data['body']
        );
    }
}
