<?php

namespace App\Models;

use Illuminate\Contracts\Support\Arrayable;

class Company implements Arrayable
{
    public function __construct(
        private string $name,
        private string $catchPhrase,
        private string $bs
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCatchPhrase(): string
    {
        return $this->catchPhrase;
    }

    public function setCatchPhrase(string $catchPhrase): void
    {
        $this->catchPhrase = $catchPhrase;
    }

    public function getBs(): string
    {
        return $this->bs;
    }

    public function setBs(string $bs): void
    {
        $this->bs = $bs;
    }

    public function toArray(): array
    {
        return [
            "name" => $this->getName(),
            "catchPhrase" => $this->getCatchPhrase(),
            "bs" => $this->getBs(),
        ];
    }
}
