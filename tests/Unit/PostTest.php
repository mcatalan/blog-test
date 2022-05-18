<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    /**
     * @test
     */
    public function post_all_works()
    {
        $repository = $this->instantiateMockRepository();
        $all = $repository->all();

        $this->assertInstanceOf(Collection::class, $all);
        $this->assertInstanceOf(Post::class, $all[0]);
        $this->assertCount(2, $all);
    }

    /**
     * @test
     */
    public function post_all_empty_works()
    {
        $repository = $this->instantiateEmptyMockRepository();
        $all = $repository->all();

        $this->assertInstanceOf(Collection::class, $all);
        $this->assertCount(0, $all);
    }

    /**
     * @test
     */
    public function post_find_works()
    {
        $repository = $this->instantiateMockRepository();
        $post = $repository->find(2);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals(2, $post->getId());
        $this->assertEquals(1, $post->getAuthorId());
        $this->assertEquals("Test title 2", $post->getTitle());
        $this->assertEquals("Test body 2", $post->getBody());
    }

    /**
     * @test
     */
    public function post_find_empty_works()
    {
        $repository = $this->instantiateEmptyMockRepository();
        $post = $repository->find(2);

        $this->assertNull($post);
    }

    private function instantiateMockRepository()
    {
        return new PostRepositoryMock([
            [
                "id" => 1,
                "userId" => 1,
                "title" => "Test title 1",
                "body" => "Test body 1"
            ],
            [
                "id" => 2,
                "userId" => 1,
                "title" => "Test title 2",
                "body" => "Test body 2"
            ]
        ]);
    }

    private function instantiateEmptyMockRepository()
    {
        return new PostRepositoryMock([]);
    }
}

class PostRepositoryMock extends PostRepository
{
    public function __construct(
        private array $mockedData
    ) {}

    public function get(): ?array
    {
        return $this->mockedData;
    }
}
