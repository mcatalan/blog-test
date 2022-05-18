<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Author;
use App\Models\Company;
use App\Repositories\AuthorRepository;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    /**
     * @test
     */
    public function author_all_works()
    {
        $repository = $this->instantiateMockRepository();
        $all = $repository->all();

        $this->assertInstanceOf(Collection::class, $all);
        $this->assertInstanceOf(Author::class, $all[0]);
        $this->assertCount(2, $all);
    }

    /**
     * @test
     */
    public function author_all_empty_works()
    {
        $repository = $this->instantiateEmptyMockRepository();
        $all = $repository->all();

        $this->assertInstanceOf(Collection::class, $all);
        $this->assertCount(0, $all);
    }

    /**
     * @test
     */
    public function author_find_works()
    {
        $repository = $this->instantiateMockRepository();
        $author = $repository->find(2);

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals(2, $author->getId());
        $this->assertEquals("Test name 2", $author->getName());
        $this->assertEquals("Test username 2", $author->getUsername());
        $this->assertInstanceOf(Address::class, $author->getAddress());
        $this->assertEquals("Test phone 2", $author->getPhone());
        $this->assertEquals("Test website 2", $author->getWebsite());
        $this->assertInstanceOf(Company::class, $author->getCompany());
    }

    /**
     * @test
     */
    public function author_find_empty_works()
    {
        $repository = $this->instantiateEmptyMockRepository();
        $author = $repository->find(2);

        $this->assertNull($author);
    }

    private function instantiateMockRepository()
    {
        return new AuthorRepositoryMock([
            [
                "id" => 1,
                "name" => "Test name 1",
                "username" => "Test username 1",
                "email" => "Test email 1",
                "address" => [
                    "street" => "Test street 1",
                    "suite" => "Test suite 1",
                    "city" => "Test city 1",
                    "zipcode" => "Test zipcode 1",
                    "geo" => [
                        "lat" => -1.111,
                        "lng" => 1.111
                    ]
                ],
                "phone" => "Test phone 1",
                "website" => "Test website 1",
                "company" => [
                    "name" => "Test company name 1",
                    "catchPhrase" => "Test catchPhrase 1",
                    "bs" => "Test bs 1",
                ]
            ],
            [
                "id" => 2,
                "name" => "Test name 2",
                "username" => "Test username 2",
                "email" => "Test email 2",
                "address" => [
                    "street" => "Test street 2",
                    "suite" => "Test suite 2",
                    "city" => "Test city 2",
                    "zipcode" => "Test zipcode 2",
                    "geo" => [
                        "lat" => -2.222,
                        "lng" => 2.222
                    ]
                ],
                "phone" => "Test phone 2",
                "website" => "Test website 2",
                "company" => [
                    "name" => "Test company name 2",
                    "catchPhrase" => "Test catchPhrase 2",
                    "bs" => "Test bs 2",
                ]
            ]
        ]);
    }

    private function instantiateEmptyMockRepository()
    {
        return new AuthorRepositoryMock([]);
    }
}

class AuthorRepositoryMock extends AuthorRepository
{
    public function __construct(
        private array $mockedData
    ) {}

    public function get(): ?array
    {
        return $this->mockedData;
    }
}
