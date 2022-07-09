<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index() {
        return $this->postRepository->getAll();
    }
}
