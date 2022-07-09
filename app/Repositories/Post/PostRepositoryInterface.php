<?php
namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
 {
     public function getAll(): Collection;
     public function getById($id): Post;
     public function create(array $data): Post;
     public function update($id, array $data): Post;
     public function delete($id): bool;
 }
