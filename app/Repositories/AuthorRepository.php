<?php

namespace App\Repositories;

use App\Contracts\AuthorRepositoryInterface;
use App\Models\Address;
use App\Models\Author;
use App\Models\Company;
use App\Models\Coordinates;

class AuthorRepository extends ApiRepository implements AuthorRepositoryInterface
{
    protected string $path = 'users';

    public function all(): array
    {
        $results = $this->get();
        if (!$results) return [];

        $data = [];
        foreach ($results as $result) {
            $data[] = $this->make($result);
        }

        return $data;
    }

    public function find(int $id): ?Author
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

    private function make(array $data): Author
    {
        $coordinates = new Coordinates(
            $data['address']['geo']['lat'],
            $data['address']['geo']['lng']
        );
        $address = new Address(
            $data['address']['street'],
            $data['address']['suite'],
            $data['address']['city'],
            $data['address']['zipcode'],
            $coordinates
        );
        $company = new Company(
            $data['company']['name'],
            $data['company']['catchPhrase'],
            $data['company']['bs']
        );

        return new Author(
            $data['id'],
            $data['name'],
            $data['username'],
            $data['email'],
            $address,
            $data['phone'],
            $data['website'],
            $company
        );
    }
}
