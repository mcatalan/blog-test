<?php

namespace App\Dtos;

use App\Models\Author;
use Illuminate\Contracts\Support\Arrayable;

class PostDto implements Arrayable
{
    public function __construct(
        private int $id,
        private Author $author,
        private string $title,
        private string $body
    ) {}

    public function toArray()
    {
        return [
            "id" => $this->id,
            "author" => $this->author->toArray(),
            "title" => $this->title,
            "body" => $this->body,
        ];
    }
}
