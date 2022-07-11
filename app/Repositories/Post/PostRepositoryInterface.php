<?php
namespace App\Repositories\Post;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
 {
     public function getAll();
     public function getById(int $id);
     public function create(array $data);
     public function update(int $id, array $data);
     public function delete(int $id);
 }
