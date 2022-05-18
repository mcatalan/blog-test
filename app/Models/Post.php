<?php

namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;

class Post implements Arrayable
{
    public function __construct(
        private int $id,
        private int $authorId,
        private string $title,
        private string $body
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "authorId" => $this->getAuthorId(),
            "title" => $this->getTitle(),
            "body" => $this->getBody(),
        ];
    }
}
