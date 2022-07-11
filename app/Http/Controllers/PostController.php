<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\ShowRequest;
use App\Http\Resources\Post\PostCollection;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function index(): PostCollection
    {
        return new PostCollection($this->postRepository->getAll());
    }
    public function store(CreateRequest $request): PostResource
    {
        return new PostResource($this->postRepository->create($request->validated()));
    }
    public function show(int $id): PostResource
    {
        return new PostResource($this->postRepository->getById($id));
    }
    public function destroy(int $id): bool
    {
        return $this->postRepository->delete($id);
    }
}
