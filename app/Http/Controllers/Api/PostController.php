<?php

namespace App\Http\Controllers\Api;

use App\Dtos\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Repositories\AuthorRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function __construct(
        private PostRepository $postRepository,
        private AuthorRepository $authorRepository
    ) {}

    public function index(): JsonResponse
    {
        return response()->json(
            $this->postRepository->all()
        );
    }

    public function show(int $id): JsonResponse
    {
        $post = $this->postRepository->find($id);
        $author = $this->authorRepository->find($post->getAuthorId());

        $dto = new PostDto(
            $post->getId(),
            $author,
            $post->getTitle(),
            $post->getBody()
        );

        return response()->json($dto);
    }

    public function store(PostStoreRequest $request): JsonResponse
    {
        $authorId = $request->get('author_id');
        $title = $request->get('title');
        $body = $request->get('body');

        // @TODO: Uncomment this when database exists
//        $post = Post::create([
//            'authorId' => $authorId,
//            'title' => $title,
//            'body' => $body
//        ]);
//
//        return response()->json($post);
    }
}
