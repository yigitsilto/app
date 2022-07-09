<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface {

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::all();
    }

    public function getById($id): \App\Models\Post
    {
        // TODO: Implement getById() method.
    }

    public function create(array $data): \App\Models\Post
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $data): \App\Models\Post
    {
        // TODO: Implement update() method.
    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
    }
}
