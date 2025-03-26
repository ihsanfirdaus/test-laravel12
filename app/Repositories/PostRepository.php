<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::all();
    }

    public function getById(string $id) : Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update(string $id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);

        return $post;
    }

    public function delete(string $id)
    {
        $post = Post::findOrFail($id);

        return $post->delete();
    }
}