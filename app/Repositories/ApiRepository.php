<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

abstract class ApiRepository
{
    protected string $domain = 'https://jsonplaceholder.typicode.com/';
    protected string $path;

    public function get(): ?array
    {
        return Http::get($this->domain . $this->path)->json();
    }
}
