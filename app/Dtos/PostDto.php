<?php

namespace App\Dtos;

use App\Models\Author;

class PostDto
{
    public function __construct(
        public Author $author,
        public string $title,
        public string $body
    ) {}
}
