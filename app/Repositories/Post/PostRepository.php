<?php

namespace App\Repositories\Post;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface {

    public function getAll()
    {
        return Post::with('user')->paginate(config('app.pagination_size'));
    }

    public function getById(int $id): \Illuminate\Database\Eloquent\Builder|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
    {
        return Post::with('user')->findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update($id, array $data): \Illuminate\Database\Eloquent\Collection
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        $post = Post::findOrFail($id);
        if($post->user_id != auth()->id()) {
            throw new \Exception('You are not allowed to delete this post');
        }
       return Post::destroy($id);
    }
}
