<?php

namespace App\Http\Controllers;

use App\Dtos\PostDto;
use App\Http\Requests\PostStoreRequest;
use App\Repositories\AuthorRepository;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    public function __construct(
        private PostRepository $postRepository,
        private AuthorRepository $authorRepository
    ) {}

    public function index()
    {
        $posts = $this->postRepository->all();

        $list = [];
        foreach ($posts as $post) {
            $author = $this->authorRepository->find($post->getAuthorId());

            $list[] = new PostDto(
                $author,
                $post->getTitle(),
                $post->getBody()
            );
        }

        return response()->json($list);
    }

    public function store(PostStoreRequest $request)
    {
        $authorId = $request->get('author_id');
        $title = $request->get('title');
        $body = $request->get('body');

        // @TODO: Uncomment this when database exists
//        Post::create([
//            'authorId' => $authorId,
//            'title' => $title,
//            'body' => $body
//        ]);
    }
}
